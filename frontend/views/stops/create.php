<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Stops $model */

$this->title = 'Create Stops';
$this->params['breadcrumbs'][] = ['label' => 'Stops', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stops-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
