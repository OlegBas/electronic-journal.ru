<?php
namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class cardPeople extends Model
{
    public $fio;
    public $dateOfBirth;
    public $address;
    public $fioMother;
    public $fioFather;
    public $placeWorkMother;
    public $placeWorkFather;
    public $addressMother;
    public $addressFather;
    public $phoneMother;
    public $phoneFather;
    public $family;
    public $activity;
    public $characteric;
    public $idPeople;
    

    private $_user;


    /**
     * {@inheritdoc}
     */

     /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['fio', 'dateOfBirth', 'address', 'fioMother', 'fioFather', 'placeWorkMother', 'placeWorkFather', 'addressMother', 'addressFather','phoneMother', 'phoneMother', 'family', 'activity', 'characteric'], 'required','message' => 'Заполните поле "{attribute}"! '],
            [['fio', 'dateOfBirth', 'address', 'fioMother', 'fioFather', 'placeWorkMother', 'placeWorkFather', 'addressMother', 'addressFather','phoneMother', 'phoneMother', 'family', 'activity', 'characteric'], 'safe'],

        ];
    }

    public  function attributeLabels()
    {
        return [
            'username' => 'Имя пользователя',
            'password' => 'Пароль',
            'rememberMe' => 'Запомнить меня?',
        ];
    }
    

    
}
