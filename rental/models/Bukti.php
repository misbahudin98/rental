<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bukti".
 *
 * @property int $id
 * @property string $bukti
 *
 * @property Penyewaan $id0
 */
class Bukti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'bukti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['file'],'file'],     
            [['bukti'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['id'], 'exist', 'skipOnError' => true, 'targetClass' => Penyewaan::className(), 'targetAttribute' => ['id' => 'id_sewa']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'file' => 'Bukti',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Penyewaan::className(), ['id_sewa' => 'id']);
    }
}
