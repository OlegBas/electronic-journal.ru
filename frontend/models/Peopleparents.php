<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "peopleparents".
 *
 * @property int $id
 * @property int $idPeople
 * @property int $idParent
 */
class Peopleparents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peopleparents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPeople', 'idParent'], 'required'],
            [['idPeople', 'idParent'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idPeople' => 'Id People',
            'idParent' => 'Id Parent',
        ];
    }
}
