<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class AboutgroupForm extends Model
{
    public $id;
    public $year;
    public $idClRuk;
    public $prop1;
    public $prop2;
    public $prop3;
    public $prop4;
    public $prop5;
    public $prop6;
    public $prop7;
    public $prop8;
    
    
    public function rules()
    {
        return [
           [ ['id','year','idClRuk','prop1','prop2','prop3','prop4','prop5','prop6','prop7','prop8'], 'safe'],
        ];
    }

    public function attributeLabels(){
        return [
            'year' => 'Учебный год' , 
            'idClRuk' => 'ФИО классного руководителя' ,
            'prop1' => 'Староста класс' ,
            'prop2' => 'Заместитель старосты' ,
            'prop3' => 'Председатель учебно-производственного сектора' ,
            'prop4' => 'Председатель сектора дисциплины и порядка' ,
            'prop5' => 'Председатель научно технического сектора' ,
            'prop6' => 'Председатель спортивного сектора' ,
            'prop7' => 'Председатель культурно-массового сектора'  ,
            'prop8' => 'Председатель информационно-издательского сектора' 
        ];
    }
}
