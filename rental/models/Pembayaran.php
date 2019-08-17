<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pembayaran".
 *
 * @property int $id
 * @property string $bukti
 *
 * @property Penyewaan $id0
 */
class Pembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    public static function tableName()
    {
        return 'pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bukti'], 'string', 'max' => 255],
            [['file'],'file'], 
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
                'File' => 'Logo',
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
