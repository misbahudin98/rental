<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\customer */
/* @var $form ActiveForm */
?>
<div class="register">

    	<?php $form = ActiveForm::begin(); ?>
		<?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->input('password') ?>
        <?= $form->field($model, 'email') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- register -->
