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
    public $id;
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
           [ ['id','username','email','password','role','fio','phone','dateOfBirth','address','photo'], 'safe'],
           [ ['fio','email'],'required', 'message' => 'Заполните поле "{attribute}"! '],
        ];
    }

    public function attributeLabels(){
        return [
            'fio' => 'ФИО',
            'dateOfBirth' => 'Дата рождения',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'address' => 'Адрес',
            'phone' => 'Телефон',
            'photo' => 'Фото',
        ];
    }


    public function upload()
    {
        // echo "upload";
        if ($this->validate()) {
            $this->photo->saveAs('web/images/teachers/' . $this->photo->baseName . '.' . $this->photo->extension);
            return true;
        } else {
            // print_r($this->errors);
            return false;
        }
    }
}
