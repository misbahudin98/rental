<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\customer */
/* @var $form ActiveForm */
?>
<h1>Masukkan ID SEWA anda</h1>

<div class="formcustomer">

    <?php $form = ActiveForm::begin(); ?>
		
		<?= $form->field($model, 'id') ?>
	<?= $form->field($model, 'file')->fileInput();	 ?>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- formcustomer -->
