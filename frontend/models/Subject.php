<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Subject extends ActiveRecord
{
    
    public $grades;
    public $subjectName;
    public $avg;
    public function afterFind(){
        $idPeople = Yii::$app->request->get('id');
        $grades = Grade::find()->select(['id','mark','sem'])->where(['idPeople' => $idPeople])->andWhere(['idSubject' => $this->id])->asArray()->all();
        $this->avg = round(Yii::$app->db->createCommand("SELECT AVG(mark) FROM `grade` WHERE `idPeople` = '".$idPeople."'")->queryColumn()[0],2);
       
        $arrGrades = [];
        for ($i=0; $i < count($grades); $i++) { 
            $arrGrades[$grades[$i]['sem']] = $grades[$i]['mark'];
            // $arrGrades[$grades[$i]['id']] = $grades[$i]['id'];
        }
        //  print_r($arrGrades);
        // $arrFullGrades  = ['title' => $this->title, 'grades' => $arrGrades];
        $this->subjectName = $this->title;
        $this->grades = $arrGrades;
        // print_r($this);
    }
}
