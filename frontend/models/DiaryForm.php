<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class DiaryForm extends Model
{
    public $id;
    public $prop9;
    
    
    
    public function rules()
    {
        return [
           [ ['id','prop9'], 'safe'],
        ];
    }

    public function attributeLabels(){
        return [
            'prop9' => 'Введите текст',
        ];
    }
}
