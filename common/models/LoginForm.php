<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $user = false;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required','message' => 'Заполните поле {attritube}! '],
            // rememberMe must be a boolean value
            ['password', 'validatePassword'],

        ];
    }

    public  function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if(!$this->getUser())
            {
           $this->addError($attribute, 'Неверный пароль');
            } 
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser());
        }
    }


    public function getUser()
    {
      if ($this->user === false) {
    $this->user = User::findOne(['username'=>$this->username, 
                                  'password'=>md5($this->password)]);
      }
           
     return $this->user;
   }


}
