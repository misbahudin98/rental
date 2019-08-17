<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Penyewaan */
/* @var $form ActiveForm */
?>
<div class="formtransaksi">

    <?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'tanggal_sewa')->Widget(DatePicker::class,[
            'separator' => '<i class="glyphicon glyphicon-resize-horizontal"></i>',
            'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-m-yyyy'
            ]]); ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- formtransaksi -->
