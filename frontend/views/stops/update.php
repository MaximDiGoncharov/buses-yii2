<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Stops $model */

$this->title = 'Update Stops: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Stops', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="stops-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
