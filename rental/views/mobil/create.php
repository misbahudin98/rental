<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Mobil */

$this->title = 'Create Mobil';
$this->params['breadcrumbs'][] = ['label' => 'Mobils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobil-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
