<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Buses $model */

$this->title = 'Create Buses';
$this->params['breadcrumbs'][] = ['label' => 'Buses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buses-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
