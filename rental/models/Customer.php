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
 *
 * @property Penyewaan[] $penyewaans
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'email'], 'required'],
            [[ 'email'], 'string', 'max' => 255],
            [['username', 'password'], 'string'],
            [['email'],'email']  ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
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
