<?php
namespace frontend\models;

use Yii;
use yii\base\Model;
use frontend\models\Peoples;
use frontend\models\Teachers;
use frontend\models\Classes;
use frontend\models\Peopleparents;
use frontend\models\Parents;

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
            [['username', 'password'], 'required','message' => 'Заполните поле "{attribute}"! '],
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
            $user =  $this->getUser();
            
            $userRole = $user->role;
            
            if($userRole == "pupil") {
                $userInfo = Peoples::find()->where(['idusers' => $user->id])->one();
                $classPeople = Classes::find()->where(['id' => $userInfo->idClass])->one();
                $session->set("classPeople",$classPeople);
                $session->set("people",$userInfo);
    
                $idsPeopleparents = Peopleparents::find()->select(['id'])->where(['idPeople' => $user->id])->asArray()->all();
                $ids = [];
                for ($i=0; $i < count($idsPeopleparents); $i++)  
                    $ids[] = $idsPeopleparents[$i]['id'];

                $parents = Parents::findAll($ids);
                $session->set("parentsPeople",$parents);
               
            }
            else {
                $userInfo = Teachers::find()->where(['idusers' => $user->id])->one();
                $session->set("subjects","");
            }

            $session->set("user",$user);
            $session->set("userInfo",$userInfo);
            $session->set("userRole",$userRole);
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
