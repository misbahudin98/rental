<?php
use yii\helpers\Html;

use yii\widgets\LinkPager;
?>
<h1>Apakah Anda Ingin Menyewa Mobil Ini ?</h1>

<table class="table table-hover">
	<thead>
		<tr>
			<th>Merk</th>			
		</tr>
		<tr>
			<td>   <?php echo $mobil->merk; ?><br></td>
			
		</tr>
			<tr>
			<th>Kapasitas</th>
			</tr>
		<tr>
			<td>   <?php echo $mobil->kapasitas; ?><br></td>
		</tr>
		<tr>			
		    <th>Harga Per-hari</th>			
		</tr>
		<tr>
			<td>   <?php echo $mobil->harga;?><br></td>
		</tr>
	</thead>
</table>
<br>
<?= html::a('lanjutkan','formcustomer?id='.$mobil->id ,['class' => 'btn btn-primary'])?>

<?= html::a('Kembali','itu',['class' => 'btn btn-primary'])?>
