<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SocialmapForm extends Model
{
    public $id;
    public $fio;
    public $prop1;
    public $prop2;
    public $prop3;
    public $prop4;
    public $prop5;
    public $prop6;
    public $prop7;
    
    
    public function rules()
    {
        return [
            return [
                [['id','prop1','prop2','prop3','prop4','prop5','prop6','prop7'], 'safe'],
             ];
        ];
    }

    public function attributeLabels(){
        return [
            'fio' => 'ФИО',
            'prop1' => 'Семья полная',
            'prop2' => 'Семья неполная',
            'prop3' => 'Многодетные',
            'prop4' => 'Беженцы переселенцы',
            'prop5' => 'Родители инвалиды',
            'prop6' => 'Дети инвалиды',
            'prop7' => 'Опекаемые',
        ];
    }
}
