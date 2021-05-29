<?php

namespace frontend\models;
use common\models\User;
use Yii;

/**
 * This is the model class for table "classes".
 *
 * @property int $id
 * @property string $title
 */
class Classes extends \yii\db\ActiveRecord
{

    public $fioClRuk;
    public $countPupils;
    public $countMalePupils;
    public $countFemalePupils;
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
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
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
        ];
    }

    public function afterFind(){
        $this->fioClRuk = Yii::$app->db->createCommand("SELECT `fio` FROM `user`  WHERE `id` = ".$this->idClRuk)->queryOne()['fio'];
        $this->countPupils = Yii::$app->db->createCommand("SELECT COUNT(*) FROM `peoples`  WHERE `idClass` = ".$this->id)->queryOne()['COUNT(*)'];
        $this->countMalePupils = Yii::$app->db->createCommand("SELECT COUNT(*) FROM `peoples`  WHERE `idClass` = ".$this->id." AND `gender` = 0")->queryOne()['COUNT(*)'];
        $this->countFemalePupils = Yii::$app->db->createCommand("SELECT COUNT(*) FROM `peoples`  WHERE `idClass` = ".$this->id." AND `gender` = 1")->queryOne()['COUNT(*)'];
    }


}
