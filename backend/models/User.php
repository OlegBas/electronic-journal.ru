<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $fio
 * @property string $photo
 * @property int $status
 * @property string $auth_key
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

     public $image;
     public $newPassword;
     public $classes;



    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
           [['fio','username','email','dateOfBirth','address','phone','password','photo','newPassword'],'safe'],
        ];
    }   

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'email' => 'Email',
            'password' => 'Пароль',
            'newPassword' => 'Пароль',
            'role' => 'Роль',
            'phone' => 'Телефон',
            'classes' => 'Класс',
            'dateOfBirth' => 'Дата рождения',
            'address' => 'Адрес',
            'fio' => 'ФИО',
            'photo' => 'Фотография',
            'status' => 'Статус',
            'auth_key' => 'Ключ сессии',
        ];
    }

    public function upload()
    {
        // echo "upload";
        if ($this->validate()) {
            $this->image->saveAs('../frontend/web/images/teachers/' . $this->image->baseName . '.' . $this->image->extension);
            return true;
        } else {
            // print_r($this->errors);
            return false;
        }
    }


 
}
