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
}
