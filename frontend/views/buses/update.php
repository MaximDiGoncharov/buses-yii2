<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Buses $model */

$this->title = 'Update Buses: ' . $model->bus_id;
$this->params['breadcrumbs'][] = ['label' => 'Buses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bus_id, 'url' => ['view', 'bus_id' => $model->bus_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="buses-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
