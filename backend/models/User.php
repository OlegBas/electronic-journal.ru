<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $role
 * @property string $fio
 * @property string $photo
 * @property int $status
 * @property string $auth_key
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'role', 'fio', 'photo', 'status', 'auth_key'], 'required'],
            [['status'], 'integer'],
            [['username', 'email', 'password', 'role', 'fio', 'photo', 'auth_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Имя пользователя',
            'email' => 'Email',
            'password' => 'Пароль',
            'role' => 'Роль',
            'fio' => 'ФИО',
            'photo' => 'Фотография',
            'status' => 'Статус',
            'auth_key' => 'Ключ сессии',
        ];
    }
}
