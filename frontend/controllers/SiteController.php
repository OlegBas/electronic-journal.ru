<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
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
use frontend\models\DiaryForm;
use frontend\models\BusypeopleForm;
use frontend\models\AboutgroupForm;
use frontend\models\SocialmapForm;
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
    $publicActions = ['login','request-password-reset','reset-password',''];
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

     private function editLDataPeople($model){
        $user =  User::findOne($model->id);
        // print_r($model);
        if($model->fio) $user->fio = $model->fio;
        if($model->dateOfBirth) $user->dateOfBirth = $model->dateOfBirth;
        if($model->email) $user->email = $model->email;
        if($model->address) $user->address = $model->address;
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
                // $listActions['grades'],
                // $listActions['timetable'],
                // $listActions['plans'],
            ];
         else if($role == 'teacher')
                return  [ 
                    $listActions['lkInfo'],
                    // $listActions['grades'],
                    // $listActions['timetable'],
                    // $listActions['plans'],
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
            if($this->editLDataPeople($model)) return $this->goHome();

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
        $model->fioMother = $people->parents[1]['fio'];
        $model->fioFather = $people->parents[0]['fio'];
        $model->placeWorkMother = $people->parents[1]['placeWork'];
        $model->placeWorkFather = $people->parents[0]['placeWork'];
        $model->addressMother = $people->parents[1]['address'];
        $model->addressFather = $people->parents[0]['address'];
        $model->phoneMother = $people->parents[1]['phone'];
        $model->phoneFather = $people->parents[0]['phone'];
        $model->family =  $people->prop8;
        $model->activity = $people->prop9;
        $model->characteric = $people->prop10;
        $model->idPeople = $people->id;
        return $model;
    }

    private function saveCardPeople($model,$isNew = false){
        
        if(!$isNew){
            $idPeople = $model->idPeople;
            $people = Peoples::find()->where(['id' => $idPeople])->one();
            $idUser = $people->user['id'];
            $idParentMale = $people->parents[0]['id'];
            $idParentFemale = $people->parents[1]['id'];
            $user = User::find()->where(['id' => $idUser])->one();
            $parentMale = Parents::find()->where(['id' => $idParentMale])->one();
            $parentFemale = Parents::find()->where(['id' => $idParentFemale])->one();
        }
        else{
            $people = new Peoples();
            $user = new User();
            $parentMale = new Parents();
            $parentFemale = new Parents();
        }

        $user->fio = $model->fio;
        $user->dateOfBirth = $model->dateOfBirth;
        $user->address = $model->address;
        $user->save();
        $idUser= Yii::$app->db->getLastInsertID();

        if($isNew){
            $people->idusers = $idUser;
            $people->idClRuk = 18;
            $people->idClass = 1;
            $people->gender = 0;
        }


        $people->prop8 = $model->family;
        $people->prop9 = $model->activity;
        $people->prop10 = $model->characteric;
        $people->save();
        $idPeople = Yii::$app->db->getLastInsertID();

        if($isNew){
            $idPeople = Yii::$app->db->getLastInsertID();
        }

        $parentMale->fio = $model->fioFather;
        $parentMale->placeWork = $model->placeWorkFather;
        $parentMale->address =  $model->addressFather;
        $parentMale->phone = $model->phoneFather;
        
        if($isNew){
            $parentMale->role = "отец";
            $parentMale->idPeople = $idPeople;
        }
        $parentMale->save();

        $parentFemale->fio = $model->fioMother;
        $parentFemale->placeWork = $model->placeWorkMother;
        $parentFemale->address =  $model->addressMother;
        $parentFemale->phone = $model->phoneMother;
        if($isNew){
            $parentFemale->role = "мать";
            $parentFemale->idPeople = $idPeople;
        }
        $parentFemale->save();

    }

    public function actionAddpeople()
    {

        $model = new cardPeople();
        if ($model->load(Yii::$app->request->post())) {
            print_r($_POST);
            // $this->saveCardPeople($model,$isNew = true);
            return $this->redirect(['index', 'id' => 1]);
        }
        return $this->render('teacherAccount/editFormPupil', [
            'model' => $model,
            'addPeople' => true
        ]);
    }



    public function actionEdit($id)
    {

        $model = $this->loadDataInModelcardPeople($id);
        if ($model->load(Yii::$app->request->post())) {
            $this->saveCardPeople($model);
            return $this->redirect(['index', 'id' => 1]);
        }
        return $this->render('teacherAccount/editFormPupil', [
        'people' => Peoples::find()->where(['id' => $id])->one(),
        'model' => $model,
        ]);
    }




    public function actionEditaboutgroup($id){
        $model  = new AboutgroupForm();
        $allClRuks = User::find()->where(['role' => 'teacher'])->all();
        $allClRuks = ArrayHelper::map($allClRuks,'id','fio');
        $objClass = Classes::find()->where(['id' => $id])->one();
        if ($model->load(Yii::$app->request->post())) {
            $objClass->prop1 = $model->prop1;
            $objClass->prop2 = $model->prop2;
            $objClass->prop3 = $model->prop3;
            $objClass->prop4 = $model->prop4;
            $objClass->prop5 = $model->prop5;
            $objClass->prop6 = $model->prop6;
            $objClass->prop7 = $model->prop7;
            $objClass->prop8 = $model->prop8;
            $objClass->save();
            return $this->redirect(['index', 'id' => 1]);
        }
        return $this->render('teacherAccount/editaboutgroup', [
            'model' => $model,
            'objClass' => $objClass,
            'allClRuks' => $allClRuks,

         ]);
    }


    public function actionEditsocialmap($id){
        $model  = new SocialmapForm();
        $objPeople = Peoples::find()->where(['id' => $id])->one();
        $model->load($objClass);
        if ($model->load(Yii::$app->request->post())) {
            $objPeople->prop1 = $model->prop1;
            $objPeople->prop2 = $model->prop2;
            $objPeople->prop3 = $model->prop3;
            $objPeople->prop4 = $model->prop4;
            $objPeople->prop5 = $model->prop5;
            $objPeople->prop6 = $model->prop6;
            $objPeople->prop7 = $model->prop7;
            $objPeople->save();
            return $this->redirect(['index', 'id' => 1]);

        }
        //print_r($objPeople);
        return $this->render('teacherAccount/editsocialmap', [
            'model' => $model,
            'objPeople' => $objPeople,
         ]);
    }
    
    public function actionEditbusypeople($id){
        $model  = new BusypeopleForm();
        $objPeople = Peoples::find()->where(['id' => $id])->one();

        if ($model->load(Yii::$app->request->post())) {
            $objPeople->prop9 = $model->prop9;
            $objPeople->save();
            return $this->redirect(['index', 'id' => 1]);
        }

        return $this->render('teacherAccount/editbusypeople', [
            'model' => $model,
            'objPeople' => $objPeople,
         ]);
    }

    public function actionEditdiary($id){
        // echo $id;
        $model  = new DiaryForm();
        $objClass = Classes::find()->where(['id' => $id])->one();

        if ($model->load(Yii::$app->request->post())){
            $objClass->prop9 = $model->prop9;
            $objClass->save();
            return $this->redirect(['index', 'id' => 1]);

        }
        return $this->render('teacherAccount/editdiary', [
            'model' => $model,
            'objClass' => $objClass,
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
                Yii::$app->session->setFlash('success', 'На указанный email отправлено письмо с инструкцией по восстановлению пароля!');
            } else {
                Yii::$app->session->setFlash('error', 'Пользователь, с указанным e-mail адресом не зарегистрирован в приложении!');
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
            Yii::$app->session->setFlash('success', 'Новый пароль успешно установлен!');

            // return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    

    


   
    

    
}
