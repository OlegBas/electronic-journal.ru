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
    public $gender;
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
            [['fio', 'dateOfBirth','gender', 'address', 'fioMother', 'fioFather', 'placeWorkMother', 'placeWorkFather', 'addressMother', 'addressFather','phoneMother', 'phoneFather', 'family', 'activity', 'characteric'], 'required','message' => 'Заполните поле "{attribute}"! '],
            [['fio', 'dateOfBirth', 'address', 'fioMother', 'fioFather', 'placeWorkMother', 'placeWorkFather', 'addressMother', 'addressFather','phoneMother', 'phoneFather', 'family', 'activity', 'characteric'], 'safe'],

        ];
    }

    public  function attributeLabels()
    {
        return [
            'fio' => 'ФИО',
            'dateOfBirth' => 'Дата рождения',
            'address' => 'Место жительства',
            'gender' => 'Пол',
            'fioMother' => 'ФИО матери',
            'fioFather' => 'ФИО отца',
            'placeWorkMother' => 'место работы матери',
            'placeWorkFather' => 'место работы отца',
            'addressMother' => 'адрес матери',
            'addressFather' => 'адрес отца',
            'phoneMother' => 'телефон матери',
            'phoneFather' => 'телефон отца',
            'family' => 'Состав семьи',
            'activity' => 'Социальная активность, увлечения, интересы',
            'characteric' => 'Характеристика студента',
        ];
    }
    

    
}
