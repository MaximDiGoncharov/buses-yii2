<?php

use app\models\RouteStops;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Остановки маршрута';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="route-stops-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Route Stops', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'route_stop_id',
            'route_id',
            'stop_id',
            'sequence_number',
            'direction',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, RouteStops $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'route_stop_id' => $model->route_stop_id]);
                 }
            ],
        ],
    ]); ?>


</div>
