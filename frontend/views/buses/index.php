<?php

use app\models\Buses;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Buses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buses-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Buses', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bus_id',
            'bus_number',
            'capacity',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Buses $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'bus_id' => $model->bus_id]);
                 }
            ],
        ],
    ]); ?>


</div>
