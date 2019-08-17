    <?php
    use yii\helpers\Html;

    use yii\widgets\LinkPager;
    ?>
        

    <center><h1 style="color: #FF4500;">Pilihan Mobil</h1>
    <?php foreach ($mobil as $mobil): ?>


    <div class="col-md-4 agileits_service_grid_btm_left">
                        <div class="agileits_service_grid_btm_left1"><br>
                            <div class="agileits_service_grid_btm_left2"> 
                              
               <h3> <?= 'Mobil '.Html::encode("{$mobil->merk}") ?>  </h3><br>
                            <?= Html::img('@web/'.$mobil->logo,['width'=>'100','height'=>'150'], ['alt' => 'My logo']) ?>

                
                        <h4>Dengan Kapasitas</h4>
                            <p><?= $mobil->kapasitas ?> Orang</p>   
                      

                
                            </div>
      
                        </div>
    <br>
                    <?php 
                        $a =0;
                    if($mobil->status == 'tidak tersedia'){
                                echo Html::button( 'Tidak Tersedia', ['class' => 'btn btn-primary','disabled'=>'true']);
                             echo '<br> hingga '.$mobil->hingga;}
                            else {
                            $a =$mobil->id;
                                echo Html::a( 'Sewa ', 'sewa?id='.$mobil->id , ['class' => 'btn btn-success']

                            )."<br>";
                                    
                        }

                 ?>

        <br>
                    </div>
    			
           		
                   
            
    <?php endforeach; ?>

        