<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property int $tipe_akun
 *
 * @property Penyewaan[] $penyewaans
 */
class Sewa extends \yii\db\ActiveRecord
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
            [['username', 'password', 'email', 'tipe_akun'], 'required'],
            [['tipe_akun'], 'integer'],
            [['username', 'password', 'email'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'tipe_akun' => 'Tipe Akun',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenyewaans()
    {
        return $this->hasMany(Penyewaan::className(), ['id_client' => 'id']);
    }
}
