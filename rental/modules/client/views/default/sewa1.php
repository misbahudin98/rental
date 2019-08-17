<?php
use yii\helpers\Html;

use yii\widgets\LinkPager;
?>
<h3>Pembeli</h3>
		<h4><?= $c->username;?></h4>
<h3>Id Sewa</h3>
		<h4><?= $a ;?></h4>
<h3>Merk Mobil</h3>
		<h4><?= $m->merk;?></h4>
<h3>Tanggal Kembali</h3>
		<h4><?= $kembali ;?></h4>
<h3>Total Pembayaran </h3>
<?php 
 $harga='Rp. '.number_format($total,0,",",".").',00';


?>

<h4><?= $harga;?></h4>

<div class="panel panel-danger">
	<div class="panel-heading">
		<h3 class="panel-title">Catatan</h3>
	</div>
	<div class="panel-body">
		Mohon dicatat / diingat ID SEWA untuk melanjutkan ke tahap pembayaran 
		     <?= Html::a('Sewa','fix?id_client='.$id_client.'&id_mobil='.$id_mobil.'&kembali='.$kembali.'&sewa='.$sewa.'&total='.$total,['class' => 'btn btn-primary']) ?>
           		

<?= html::a('kembali','itu' ,['class' => 'btn btn-primary'])?>

	</div>
</div>