<?php

namespace frontend\models;

use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class UserForm extends Model
{
    public $fio;
    public $dateOfBirth;
    public $username;
    public $email;
    public $password;
    public $phone;
    public $address;
    public $photo;
    
    
    public function rules()
    {
        return [
           [ ['username','email','password','role','fio','phone','dateOfBirth','address','photo'], 'safe'],
           [ ['fio','email'],'required'],
        ];
    }
}
