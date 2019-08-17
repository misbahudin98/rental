<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\customer */
/* @var $form ActiveForm */
?>
<div class="Notif">
<?php foreach ($p as $p): ?>
	
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">
			<?= $p->client->username;?>
		</h3>
	</div>
	<div class="panel-body">
						 memesan  <?= $p->mobil->merk;?><br> untuk hari 
			 <b><?=$p->tanggal_sewa;?></b> sampai tanggal 
			 <b><?=$p->tanggal_kembali;?></b>
   <?= Html::a('delete','delete?id='.$p->id_sewa,['class' => 'btn btn-primary']) ?>
          
			 <br>  

	</div>
</div>
<?php if ($p->mobil->status == 'tersedia') { ?>
<?php foreach ($b as $key ): ?>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title">	<?= $p->client->username;?></h3>
		</div>
		<div class="panel-body">
			telah membayar berkut buktinya beserta ID SEWA 
			  <?= DetailView::widget([
        'model' => $key,
        'attributes' => [
              [
               'attribute'=>$key->id,
              'value' =>  '@web'.$key->bukti,
              'format' => ['image',['width'=>'500','height'=>'300']],
            ]
                        ]
                            ]) ?>
           <?= Html::a('Ganti Status','update?id='.$p->id_mobil.'&tgl='.$p->tanggal_kembali,['class' => 'btn btn-primary']) ?>
           
 
		</div>
	</div>
<?php endforeach ?>
<?php } ?>
<?php endforeach ?>
</div><!-- register -->
