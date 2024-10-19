<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Trips $model */

$this->title = $model->trip_id;
$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trips-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'trip_id' => $model->trip_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'trip_id' => $model->trip_id], [
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
            'trip_id',
            'route_id',
            'bus_id',
            'departure_time',
            'arrival_time',
        ],
    ]) ?>

</div>
