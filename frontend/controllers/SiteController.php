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

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        
        $peoples = User::find()->where(['role' => 'pupil'])->all();;



        return $this->render('index', [
            'peoples' => $peoples,
        ]); 
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
   
       
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
        $grades = Grade::find()->where(['idSubject' => 1,'idUser' => $user->id])->all();
        $subject = 'Русский язык';
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
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        $subjects = Subject::find()->all();
        return $this->render('about',[
            'subjects' => $subjects
        ]);
    }

    
}
