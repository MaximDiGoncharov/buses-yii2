<?php

use app\models\Trips;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Trips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trips-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Trips', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'trip_id',
            'route_id',
            'bus_id',
            'departure_time',
            'arrival_time',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Trips $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'trip_id' => $model->trip_id]);
                 }
            ],
        ],
    ]); ?>


</div>
