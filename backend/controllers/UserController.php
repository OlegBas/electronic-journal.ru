<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserSearch;
use frontend\models\Classes;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\helpers\ArrayHelper;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{

    public $classes; 
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    private function getClasses(){
        $classes = Classes::find()->where(['idClRuk' => 0])->all();
        return  ArrayHelper::map($classes,'id','title');
    }


    public function actionCreate()
    {
        $this->getClasses();
        $model = new User();
        // $model->fio = 'Иванов Петр';
        // $model->address = '------';
        // $model->dateOfBirth = '1996-03-31';
        // $model->save();


        if ($model->load(Yii::$app->request->post()) ) {

            if($_FILES['User']['name']['photo']){

                $model->image = UploadedFile::getInstance($model, 'photo');
                $model->upload();
                $model->role = 'teacher';
                $model->password = md5($model->password);
                $model->photo = $model->image->name;
            }
            // $model->fio = 'Иванов Петр';
            // $model->address = '------';
            // $model->dateOfBirth = '1996-03-31';
            
            
            // $objClass = Classes::find()->where(['id' => $_POST['User']['classes']])->one();
            // $objClass->idClRuk = $model->id;
            // $objClass->save();
            // print_r($model);
            // if($model->save()) echo "Success";
            // else print_r($model);
            $model->role = 'teacher';
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }
        

        return $this->render('create', [
            'model' => $model,
            'classes' => $this->getClasses(),
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $this->getClasses();
        $model = $this->findModel($id);
        $oldPhoto = $model->photo;
        if ($model->load(Yii::$app->request->post())) {
            if($_FILES['User']['name']['photo']){

                $model->image = UploadedFile::getInstance($model, 'photo');
                $model->upload();
                $model->photo = $model->image->name;

            }
            else $model->photo = $oldPhoto;
        
            if($model->newPassword){
                $model->password = md5($model->newPassword);
            } 
        
            // print_r($model);
            // // print_r($model->id);
            
            // print_r($model);
            // $objClass = Classes::find()->where(['idClRuk' => $model->id])->one();
            // $objClass->idClRuk = 0;
            // $objClass->save();
            // $objClass = Classes::find()->where(['id' => $_POST['User']['classes']])->one();
            // $objClass->idClRuk = $model->id;
            // $objClass->save();
            
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'classes' => $this->getClasses(),
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
