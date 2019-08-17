<?php

namespace app\modules\client\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use yii\web\UploadedFile;


use app\models\Mobil;       
use app\models\Penyewaan;
use app\models\Customer;
use app\models\UploadForm;

use app\models\Bukti;
use yii;
/**
 * Default controller for the `client` module
 */
class DefaultController extends Controller
{
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect('itu');
    }
 	public function actionItu()
    {
        $query =mobil::find();
        $mobil = $query->orderBy('merk')
            ->all();

            //foreach ($mobil as $key) {echo  $key->id;}

            //return false;
        return $this->render('coba',[
            'mobil' => $mobil,            
        ]);
    }
    public function actionSewa($id){
   //     var_dump($id);
        
        $query =mobil::find();
        $mobil = $query->orderBy('id')
                ->where(['id' => $id])
                ->one();
         $query =penyewaan::find();

/*        $sewa = $query->orderBy('id_sewa')
                    ->where(['id_sewa' => $id])
                    ->all(); 
*///                  -> where ('id ='.$id) ;
         //$penyewaan =$query 
         return $this->render('sewa', [
            //'sewa' => $sewa,
            'mobil' => $mobil,
            'id'     =>$id,
        ]);


    }
    

    public function actionTotal($id_client,$id_mobil,$kembali,  $sewa,$total)
    {   
        $tgl_sewa =$sewa;
        $penyewaan = penyewaan::find()
                ->orderBy(['id_sewa'=>SORT_DESC])
                ->limit(1)
                ->all();
        $mobil = mobil::find()
        ->where(['id' => $id_mobil])
        ->one();

        $client = customer::find()
        ->where(['id' => $id_client])
        ->one();

            foreach ($penyewaan as $key ) {
                $sewa= $key->id_sewa;
            };

        
        if(is_null($sewa) ){
             $akhir = 1;
        } 
        else{
           $akhir = $sewa +   1 ;
           //$akhir ="TR".$akhir;
        }  



        
        return $this->render('sewa1',[
            'c'=> $client,
            'm'=> $mobil,
             'p'=>$penyewaan,
             'a' => $akhir,
             'tgl'=>$sewa,
            'total'=> $total, 
            'id_client'=>$id_client,
            'id_mobil' =>$id_mobil,
            'kembali'=>$kembali,
            'sewa'=>$tgl_sewa,
            'total'=>$total
        ]);
    }
   public function actionFormtransaksi($id_client,$id_mobil)
{
    $model = new \app\models\penyewaan();
    $mobil = mobil::find()
        ->where(['id' => $id_mobil])
        ->one();
    $client = customer::find()
        ->where(['id' => $id_client])
        ->one();

    if ($model->load(Yii::$app->request->post())) {

        $rentang=Yii::$app->request->post()['Penyewaan']['waktu'];
        $tgl =Yii::$app->request->post()['Penyewaan']['tanggal_sewa'];
        $waktu = date('Y-m-d', strtotime('+'.$rentang.' days', strtotime($tgl)));
        
        $total =$mobil->harga * intval($rentang);

                return    $this->redirect(['total','id_client' => $id_client ,
                    'id_mobil'=> $id_mobil,'kembali'=>$waktu,'sewa'=>$tgl,'total'=>$total]);
        
    }

    return $this->render('formtransaksi', [
        'model' => $model,
        'mobil' => $mobil,
        'cl'    => $client,
    ]);
}


public function actionFormcustomer($id)
{

    $model = new \app\models\customer();
    if ($model->load(Yii::$app->request->post()) ) {
            $customer = customer::find()
        ->where(['email' => $model->email])
                ->one();

        if ($model->validate() &&  !is_null($customer )) {
            // form inputs are valid, do something here
            
            return $this->redirect(['formtransaksi','id_client' => $customer->id ,
                    'id_mobil'=> $id]);

        }
        else {

            return $this->redirect(['register','id'=>$id]);
        }
    
        }
    return $this->render('formcustomer', [
        'model' => $model,

    ]);
}
public function actionFix(int $id_client, int $id_mobil, $kembali, $sewa, int $total){
    $penyewaan = new \app\models\penyewaan();
    $penyewaan->id_client = intval($id_client);
    $penyewaan->id_mobil =  $id_mobil;
    $penyewaan->tanggal_sewa =  $sewa;
    $penyewaan->tanggal_kembali =  $kembali;
    $penyewaan->total_pembayaran =  $total;
    $penyewaan->validate();
     date_default_timezone_set("Asia/Bangkok");//set you countary name from below timezone list
     $penyewaan->tanggal_pemesanan = date('Y-m-d');
    var_dump($penyewaan->getErrors) or die;
    $penyewaan->save();
    // if($penyewaan->validate()) {

    // } else {
    //     var_dump($penyewaan->errors) or die;
    // }
    
     $mobil=mobil::find()->all();
         return $this->render('coba',['mobil' => $mobil ]);
}

    public function actionRegister($id)
{
    $model = new \app\models\customer();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            
            // form inputs are valid, do something here
              $mobil =new \app\models\customer();

              $mobil->username = Yii::$app->request->post()['Customer']['username'];
              $mobil->password = Yii::$app->request->post()['Customer']['password'];
              $mobil->email = Yii::$app->request->post()['Customer']['email'];
              $mobil->save();
            return $this->redirect(['formcustomer','id'=>$id]);
        }
    }

    return $this->render('register', [
        'model' => $model,
    ]);
 }



    public function actionNewRegister()
    {
    $model = new \app\models\customer();

    if ($model->load(Yii::$app->request->post())) {
        if ($model->validate()) {
            
            // form inputs are valid, do something here
              $mobil =new \app\models\customer();

              $mobil->username = Yii::$app->request->post()['Customer']['username'];
              $mobil->password = Yii::$app->request->post()['Customer']['password'];
              $mobil->email = Yii::$app->request->post()['Customer']['email'];
              $mobil->save();
            return $this->redirect(['formcustomer']);
        }
    }

    return $this->render('register', [
        'model' => $model,
    ]);
}


 public function actionPembayaran()
{

       $model = new bukti();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
                     $penyewaan = penyewaan::find()
                     ->where(['id_sewa' => $model->id])
                     ->one();
            
     
            if ($model->validate() && !is_null($penyewaan) ) {
                # code...
            
            $imageName = 'sewa'.  Yii::$app->request->post()['Bukti']['id'];
            $model->file = UploadedFile::getInstance($model,'file');
            $model->file->saveAs('uploads/'.$imageName.'.'.$model->file->extension);
            //save path in the db column
            $model->bukti= 'uploads/'.$imageName.'.'.$model->file->extension;
            $model->id =  Yii::$app->request->post()['Bukti']['id'];
            $model->save();
       
            return $this->redirect('itu');
                }
        }

        return $this->render('pembayaran', [
            'model' => $model,
                    ]);
}

 }
