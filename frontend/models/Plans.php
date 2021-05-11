<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "plans".
 *
 * @property int $id
 * @property string $title
 * @property string $descr
 * @property string $type
 * @property int $idSubject
 * @property int $idTeacher
 * @property string $datetime
 */
class Plans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'plans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'descr', 'type', 'idSubject', 'idTeacher'], 'required'],
            [['descr'], 'string'],
            [['idSubject', 'idTeacher'], 'integer'],
            [['datetime'], 'safe'],
            [['title', 'type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'descr' => 'Descr',
            'type' => 'Type',
            'idSubject' => 'Id Subject',
            'idTeacher' => 'Id Teacher',
            'datetime' => 'Datetime',
        ];
    }
}
