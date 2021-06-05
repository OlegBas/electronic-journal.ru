<?php

namespace frontend\models;
use common\models\User;
use Yii;

/**
 * This is the model class for table "peoples".
 *
 * @property int $id
 * @property int $idusers
 * @property int $idClass
 */
class Peoples extends \yii\db\ActiveRecord
{


    public $classes;
    public $parents;
    public $user;

    /**
     * {@inheritdoc}
     */

    

    public static function tableName()
    {
        return 'peoples';
    }

    public function rules()
    {
        return [
            [['idusers', 'idClass'], 'required'],
            [['idusers', 'idClass'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idusers' => 'Idusers',
            'idClass' => 'Id Class',
        ];
    }

    public function afterFind(){
        $this->classes = Classes::find()->where(['id' => $this->idClass])->one();
        $this->parents = Parents::find()->where(['idPeople' => $this->id])->all();
        $this->user = Yii::$app->db->createCommand("SELECT * FROM user WHERE `id` = ".$this->idusers)->queryOne();

        /*
        if($this->prop1 == 1) $this->prop1 = "+";
        else $this->prop1 = "-";
        if($this->prop2 == 1) $this->prop2 = "+";
        else $this->prop2 = "-";
        if($this->prop3 == 1) $this->prop3 = "+";
        else $this->prop3 = "-";
        if($this->prop4 == 1) $this->prop4 = "+";
        else $this->prop4 = "-";
        if($this->prop5 == 1) $this->prop5 = "+";
        else $this->prop5 = "-";
        if($this->prop6 == 1) $this->prop6 = "+";
        else $this->prop6 = "-";
        if($this->prop7 == 1) $this->prop7 = "+";
        else $this->prop7 = "-";
        */
    }
}
