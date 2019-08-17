<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\Widgets\DetailView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Buktis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bukti-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Bukti', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'bukti',
            'id_sewa',

            ['class' => 'yii\grid\ActionColumn'],
        ],      

    ]); ?>


</div>
<?php foreach ($bukti as $key): ?>
<?= $key['bukti']?>    
<?php endforeach ?>


