<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mobil */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mobil-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'merk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kapasitas')->textInput() ?>

    <?= $form->field($model, 'harga')->textInput() ?>

	<?= $form->field($model, 'file')->fileInput();	 ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true])->dropDownlist(['tersedia','tdak tersedia']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
