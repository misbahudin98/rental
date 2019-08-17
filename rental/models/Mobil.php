<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mobil".
 *
 * @property int $id
 * @property string $merk
 * @property int $kapasitas
 * @property int $harga
 * @property string $status
 *
 * @property Penyewaan[] $penyewaans
 */
class Mobil extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mobil';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['merk', 'kapasitas', 'harga', 'status'], 'required'],
            [['kapasitas', 'harga'], 'integer'],
             [['file'],'file'],       
            [['merk','logo', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merk' => 'Merk',
            'kapasitas' => 'Kapasitas',
            'harga' => 'Harga',
            'status' => 'Status',
              
              'File' => 'Logo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPenyewaans()
    {
        return $this->hasMany(Penyewaan::className(), ['id_mobil' => 'id']);
    }
}
