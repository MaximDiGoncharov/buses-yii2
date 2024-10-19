<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Routes $model */

$this->title = 'Create Routes';
$this->params['breadcrumbs'][] = ['label' => 'Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="routes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
