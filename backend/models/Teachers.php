<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "teachers".
 *
 * @property int $id
 * @property string $fio
 * @property int $dateOfBirth
 * @property int $idSubject
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
            [['fio', 'dateOfBirth', 'idSubject'], 'required'],
            [['dateOfBirth', 'idSubject'], 'integer'],
            [['fio'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'dateOfBirth' => 'дата рождения',
            'idSubject' => 'ID предмета',
        ];
    }
}
