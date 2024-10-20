<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Routes $model */

$this->title = 'Update Routes: ' . $model->route_id;
$this->params['breadcrumbs'][] = ['label' => 'Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->route_id, 'url' => ['view', 'route_id' => $model->route_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="routes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
