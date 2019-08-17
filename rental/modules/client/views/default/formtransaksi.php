    <?php

    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
    use kartik\widgets\DatePicker;
    /* @var $this yii\web\View */
    /* @var $model app\models\penyewaan */
    /* @var $form ActiveForm */
    ?>
    <div class="formtransaksi">

        <?php $form = ActiveForm::begin(); ?>
            <h5><b> Nama Client</b> </h5>
            <h4><?php echo $cl->username; ?></h4> 
            <h5><b> Merk Mobil</b> </h5>
            <h4><?php echo $mobil->merk; ?></h4> 
            <?= $form->field($model, 'tanggal_sewa')->
            Widget(DatePicker::class,[
            'separator' => '<i class="glyphicon glyphicon-resize-horizontal"></i>',
//                    'attribute'=>'start_time',date('Y-m-d'),

            'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-m-d'

            ]]); ?>
            <?=  $form->field($model,'waktu')->textInput(['type' => 'number']);?>
            <div class="form-group">
                <?= Html::submitButton('Sewa', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
            
    </div><!-- formtransaksi -->
            