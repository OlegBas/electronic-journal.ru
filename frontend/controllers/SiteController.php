<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use common\models\User;
use frontend\models\Subject;
use frontend\models\Grade;
use yii\data\Pagination;
use frontend\models\Peoples;
use frontend\models\Classes;
use frontend\models\Teachers;
use frontend\models\Peopleparents;
use frontend\models\Parents;
use frontend\models\Plans;
use frontend\models\UserForm;
use frontend\models\cardPeople;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetPasswordForm;


/**
 * Site controller
 */
class SiteController extends Controller
{
    
// TODO SiteController
public $session;
public $app;
public $req;
public $res;
public $authUser;
public $actions;


public function beforeAction($action)
{
    
    $this->app  = Yii::$app;
    $this->req  = Yii::$app->request;
    $this->res  = Yii::$app->response;
    $this->authUser  = Yii::$app->user->identity;
    $publicActions = ['login','request-password-reset'];
    if(!in_array($action->id,$publicActions)){
        if (Yii::$app->user->isGuest) 
            return $this->redirect(['site/login']);
    }
    
    return parent::beforeAction($action);
     
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

     private function editLDataPeople(){
        $user =  User::findOne(11);
        if($model->fio) $user->fio = $model->fio;
        if($model->dateOfBirth) $user->dateOfBirth = $model->dateOfBirth;
        if($model->email) $user->email = $model->email;
        if($model->phone) $user->phone = $model->phone;
        if($model->password) $user->password = md5($model->password);
        return $user->save();
     }

     private function listActions(){
         $listActions = $this->app->params['actions'];
         $role = $this->authUser->role;
         if($role == 'pupil')
            return  [
                $listActions['lkInfo'],
                $listActions['grades'],
                $listActions['timetable'],
                $listActions['plans'],
            ];
         else if($role == 'teacher')
                return  [ 
                    $listActions['lkInfo'],
                    $listActions['grades'],
                    $listActions['timetable'],
                    $listActions['plans'],
                    $listActions['aboutGroup'],
                    $listActions['socialMapGroup'],
                    $listActions['busyGroup'],
                    $listActions['diary'],
                    $listActions['peoples'],
            ];
     }

     
    private function getNameTemplateLkInfoOnRole(){
        $fileName = "lkInfo.php";
        if($this->authUser->role == "pupil") return "peopleAccount/".$fileName;
        return "teacherAccount/".$fileName;
    }

    public function actionIndex()
    {
        $people = Peoples::find()->where(['id' => 1])->one();
        // print_r($people->user['fio']);
        $actions = $this->listActions();
        $model  = new UserForm();
        if ($model->load(Yii::$app->request->post())){
            $this->editLDataPeople();
        }
        return $this->render('index', [
            'user' => $this->authUser,
            'nameTemplateLkInfoOnRole' => $this->getNameTemplateLkInfoOnRole(),
            'actions' => $actions,
            'peoples' => Peoples::find()->all(),
            'model' => $model,
        ]); 
    }

    public function actionAboutpeople($id){
        return $this->render('teacherAccount/infoAboutPupil', [
            'selectPeople' =>  '---------------'
        ]);
    }

    public function actionPeople($id)
    {
        return $this->render('teacherAccount/infoAboutPupil', [
        'people' => Peoples::find()->where(['id' => $id])->one(),
        ]);
    }

    private function loadDataInModelcardPeople($id){
        $model = new cardPeople();
        $people = Peoples::find()->where(['id' => $id])->one();
        $model->fio = $people->user['fio'];
        $model->dateOfBirth = $people->user['dateOfBirth'];
        $model->address = $people->user['address'];
        $model->fioMother = $people->parents[0]['fio'];
        $model->fioFather = $people->parents[1]['fio'];
        $model->placeWorkMother = $people->parents[1]['placeWork'];
        $model->placeWorkFather = $people->parents[1]['placeWork'];
        $model->addressMother = $people->parents[0]['address'];
        $model->addressFather = $people->parents[1]['address'];
        $model->phoneMother = $people->parents[0]['phone'];
        $model->phoneFather = $people->parents[1]['phone'];
        $model->family =  $people->prop8;
        $model->activity = $people->prop9;
        $model->characteric = $people->prop10;
        $model->idPeople = $people->id;
        return $model;
    }

    private function saveCardPeople($model){
        $idPeople = $model->idPeople;
        $people = Peoples::find()->where(['id' => $idPeople])->one();
        $idUser = $people->user['id'];
        $user = User::find()->where(['id' => $idUser])->one();
        $idParentMale = $people->parents[0]['id'];
        $idParentFemale = $people->parents[1]['id'];
        $parentMale = Parents::find()->where(['id' => $idParentMale])->one();
        $parentFemale = Parents::find()->where(['id' => $idParentFemale])->one();

        $user->fio = $model->fio;
        $user->dateOfBirth = $model->dateOfBirth;
        $user->address = $model->address;
        $user->save();

        $parentMale->fio = $model->fioFather;
        $parentMale->placeWork = $model->placeWorkFather;
        $parentMale->address =  $model->addressFather;
        $parentMale->phone = $model->phoneFather;
        $parentMale->save();

        $parentFemale->fio = $model->fioMother;
        $parentFemale->placeWork = $model->placeWorkMother;
        $parentFemale->address =  $model->addressMother;
        $parentFemale->phone = $model->phoneMother;
        $parentFemale->save();

        $people->prop8 = $model->family;
        $people->prop9 = $model->activity;
        $people->prop10 = $model->characteric;
        $people->save();
    }



    public function actionEdit($id)
    {

        $model = $this->loadDataInModelcardPeople($id);
        if ($model->load(Yii::$app->request->post())) {
            $this->saveCardPeople($model);
        }
        return $this->render('teacherAccount/editFormPupil', [
        'people' => Peoples::find()->where(['id' => $id])->one(),
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
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }
    

    

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['site/login']);
    }

     /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        // echo 30;
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
