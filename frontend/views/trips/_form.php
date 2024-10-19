<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Trips $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="trips-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'route_id')->textInput() ?>

    <?= $form->field($model, 'bus_id')->textInput() ?>

    <?= $form->field($model, 'departure_time')->textInput() ?>

    <?= $form->field($model, 'arrival_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
