<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helper\Url;
/* @var $this yii\web\View */
/* @var $model app\models\Mobil */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Mobils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mobil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'merk',
            'kapasitas',
            'harga',
            'status',
            [
                'attribute'=>'logo',
              'value' =>  'http://localhost/rental/web/'.$model->logo,
              'format' => ['image',['width'=>'500','height'=>'300']],
            ]
                        ]
                            ]) ?>

</div>
