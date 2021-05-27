<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\LoginForm;
use frontend\models\User;
use frontend\models\Subject;
use frontend\models\Grade;
use yii\data\Pagination;
use yii\helpers\Url;
use frontend\models\Peoples;
use frontend\models\Classes;
use frontend\models\Teachers;
use frontend\models\Peopleparents;
use frontend\models\Parents;
use frontend\models\Plans;
use frontend\models\UserForm;


/**
 * Site controller
 */
class SiteController extends Controller
{
    
// TODO SiteController
public $session;


public function beforeAction($action)
{
    // echo $action->id;
    $this->session = Yii::$app->session;
    if($action->id != "login" && !$this->session->has('user'))
        return $this->redirect(Url::to(['site/login']));
    elseif($action->id == "login" && $this->session->has('user'))
        return $this->goHome();
     return parent::beforeAction($action);
    // return false;
}

    

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    private function  num_word($value, $words, $show = true) 
    {
        $num = $value % 100;
        if ($num > 19) { 
            $num = $num % 10; 
        }
        
        $out = ($show) ?  $value . ' ' : '';
        switch ($num) {
            case 1:  $out .= $words[0]; break;
            case 2: 
            case 3: 
            case 4:  $out .= $words[1]; break;
            default: $out .= $words[2]; break;
        }
        
        return $out;
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        // print_r($this->session->get("user"));
        $user = $this->session->get("user");
        $userInfo =  $this->session->get("userInfo");
        // print_r($this->session->get("userRole"));
        // print_r($this->session->get("classPeople"));
        // print_r($this->session->get("parentsPeople"));

        $peoples = Peoples::find()
            ->leftJoin('user','`peoples`.`idusers` = `user`.`id`')
            ->with('user')
            ->all();
        // print_r($peoples);
        $model  = new UserForm();
        if ($model->load(Yii::$app->request->post())){
            $user =  User::findOne($user->id);
            if($model->fio) $user->fio = $model->fio;
            if($model->dateOfBirth) $user->dateOfBirth = $model->dateOfBirth;
            if($model->email) $user->email = $model->email;
            if($model->phone) $user->phone = $model->phone;
            if($model->password) $user->password = md5($model->password);
            $user->save();
        }
        
        if($user) {
            $peopleAge = Yii::$app->db->createCommand("SELECT dateOfBirth,((YEAR(CURRENT_DATE) - YEAR(dateOfBirth)) - /* step 1 */ (DATE_FORMAT(CURRENT_DATE, '%m%d') < DATE_FORMAT(dateOfBirth, '%m%d')) /* step 2 */) AS age FROM user WHERE `id` = ".$user->id)->queryOne();
            $fioClRuk = User::find()->select(["fio"])->where(['id' => $userInfo->idClRuk])->asArray()->one();
            $avgGrade = Grade::find()->select(["AVG(mark)"])->where(['idPeople' => $user->id])->asArray()->one();
        }
         // echo $age;
        
        $subjects = Subject::find()->all();
        // print_r($this->session->get("people"));
        return $this->render('index', [
            'user' => $this->session->get("user"),
            'classPeople' =>$this->session->get("classPeople"),
            'parentsPeople' =>$this->session->get("parentsPeople"),
            'people' =>$this->session->get("people"),
            'peoples' =>$peoples,

            'subjects' => $subjects,
            'userRole' =>$this->session->get("userRole"),
            'peopleAge' => $peopleAge["age"]." ".$this->num_word($peopleAge["age"] ,['года','года','лет']),
            'fioClRuk' => $fioClRuk["fio"],
            'avgGrade' => number_format($avgGrade['AVG(mark)'],1),
            'model' => $model,
        ]); 
    }

    public function actionLogin()
    {
        //echo Yii::$app->params['adminEmail'];
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) 
            && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    

    public function actionSubject(){
        $user = Yii::$app->session->get('user');
        $idSelectSubject = Yii::$app->request->get("id");
        $grades = Grade::find()->where(['idSubject' => $idSelectSubject,'idUser' => $user->id])->all();
        $subject = Subject::find()->where(['id' => $idSelectSubject ])->one();
        $gradesArr = [];
        foreach($grades as $grade){
            $gradesArr[] = $grade->grade;
        }
        
        

        return $this->render('subject',[
            'user' =>$user,
            'subject' => $subject,
            'gradesArr' => $gradesArr,

        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        $this->session->remove('user');
        return $this->goHome();
    }

     /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }


   
    

    
}
