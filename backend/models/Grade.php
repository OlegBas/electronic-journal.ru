<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grade".
 *
 * @property int $id
 * @property int $idSubject
 * @property int $idUser
 * @property int $idTeacher
 * @property int $grade
 * @property int $date
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grade';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idSubject', 'idUser', 'idTeacher', 'grade', 'date'], 'required'],
            [['idSubject', 'idUser', 'idTeacher', 'grade', 'date'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'idSubject' => 'ID предмета',
            'idUser' => 'ID пользователя',
            'idTeacher' => 'ID Учителя',
            'grade' => 'Оценка',
            'date' => 'Дата выставления',
        ];
    }
}
