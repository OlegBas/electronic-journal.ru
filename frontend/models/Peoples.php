<?php

namespace frontend\models;

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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peoples';
    }


    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'idusers']);
    }

    /**
     * {@inheritdoc}
     */
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
    }
}
