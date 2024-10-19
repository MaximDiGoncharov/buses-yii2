<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\RouteStops $model */

$this->title = $model->route_stop_id;
$this->params['breadcrumbs'][] = ['label' => 'Route Stops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="route-stops-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'route_stop_id' => $model->route_stop_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'route_stop_id' => $model->route_stop_id], [
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
            'route_stop_id',
            'route_id',
            'stop_id',
            'sequence_number',
            'direction',
        ],
    ]) ?>

</div>
