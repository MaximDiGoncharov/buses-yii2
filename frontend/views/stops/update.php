<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Stops $model */

$this->title = 'Update Stops: ' . $model->stop_id;
$this->params['breadcrumbs'][] = ['label' => 'Stops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stop_id, 'url' => ['view', 'stop_id' => $model->stop_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stops-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
