<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Trips $model */

$this->title = 'Update Trips: ' . $model->trip_id;
$this->params['breadcrumbs'][] = ['label' => 'Trips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->trip_id, 'url' => ['view', 'trip_id' => $model->trip_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="trips-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
