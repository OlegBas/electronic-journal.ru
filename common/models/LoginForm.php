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
            ['password', 'validateAuth'],

        ];
    }

    public  function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
        ];
    }

    public function validateAuth($attribute, $params)
    {
        if (!$this->hasErrors()) {
            if(!$this->getUser())
            {
           $this->addError("errorAuth", 'Неверный логин и/или пароль');
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
        $session = Yii::$app->session;
        if ($this->validate()) {
            $session->set("user",$this->getUser());
            Yii::$app->user->login($this->getUser());
            return true;
             
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
