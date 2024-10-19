<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\RouteStops $model */

$this->title = 'Update Route Stops: ' . $model->route_stop_id;
$this->params['breadcrumbs'][] = ['label' => 'Route Stops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->route_stop_id, 'url' => ['view', 'route_stop_id' => $model->route_stop_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="route-stops-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
