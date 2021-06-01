<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class BusypeopleForm extends Model
{
    public $id;
    public $fio;
    public $prop9;

    
    public function rules()
    {
        return [
           [ ['id','fio','prop9'], 'safe'],
        ];
    }

    public function attributeLabels(){
        return [
            'fio' => 'ФИО',
            'prop9' => 'Название секции',
        ];
    }
}
