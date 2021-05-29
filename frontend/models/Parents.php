<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "parents".
 *
 * @property int $id
 * @property string $fio
 * @property string $phone
 * @property string $role
 */
class Parents extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parents';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['fio', 'phone', 'role'], 'required'],
            // [['fio', 'phone', 'role'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'Fio',
            'phone' => 'Phone',
            'role' => 'Role',
        ];
    }

    public function afterFind(){
        if($this->role == "mother") $this->role = "мать";
        else $this->role = "отец";

    }
}
