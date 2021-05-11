<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property int $id
 * @property int $idusers
 */
class Teachers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'teachers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idusers'], 'integer'],
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
        ];
    }
}
