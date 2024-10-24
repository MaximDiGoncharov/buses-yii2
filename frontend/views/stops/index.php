<?php

use app\models\Stops;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Остановки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stops-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Stops', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'stop_id',
            'stop_name',
            'latitude',
            'longitude',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Stops $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'stop_id' => $model->stop_id]);
                 }
            ],
        ],
    ]); ?>


</div>
