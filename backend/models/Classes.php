<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "classes".
 *
 * @property int $id
 * @property string $title
 * @property string $idClRuk
 * @property string $prop1
 * @property string $prop2
 * @property string $prop3
 * @property string $prop4
 * @property string $prop5
 * @property string $prop6
 * @property string $prop7
 * @property string $prop8
 * @property string $prop9
 */
class Classes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'classes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          [['title','idClRuk'],'safe'],
          [['title','idClRuk'],'required']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'idClRuk' => 'Идентификатор классного руководителя (Идентификатор пользователя)',
        ];
    }
}
