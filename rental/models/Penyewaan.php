<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penyewaan".
 *
 * @property int $id_sewa
 * @property int $id_client
 * @property int $id_mobil
 * @property string $tanggal_pemesanan
 * @property string $tanggal_sewa
 * @property string $tanggal_kembali
 * @property int $total_pembayaran
 * @property string $bukti
 *
 * @property Bukti $bukti0
 * @property Mobil $mobil
 * @property User $client
 */
class Penyewaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $waktu;
    public static function tableName()
    {
        return 'penyewaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'tanggal_kembali'], 'required'],
            [['id_client', 'id_mobil', 'total_pembayaran'], 'integer'],
            [['tanggal_pemesanan', 'tanggal_sewa', 'tanggal_kembali'], 'safe'],
            [['id_mobil'], 'exist', 'skipOnError' => true, 'targetClass' => Mobil::className(), 'targetAttribute' => ['id_mobil' => 'id']],
            [['id_client'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['id_client' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sewa' => 'Id Sewa',
            'id_client' => 'Id Client',
            'id_mobil' => 'Id Mobil',
            'tanggal_pemesanan' => 'Tanggal Pemesanan',
            'tanggal_sewa' => 'Tanggal Sewa',
            'tanggal_kembali' => 'Tanggal Kembali',
            'total_pembayaran' => 'Total Pembayaran',
            'waktu'=>'Waktu'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBukti()
    {
        return $this->hasOne(Bukti::className(), ['id' => 'id_sewa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMobil()
    {
        return $this->hasOne(Mobil::className(), ['id' => 'id_mobil']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Sewa::className(), ['id' => 'id_client']);
    }
}
