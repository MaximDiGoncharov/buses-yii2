<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Buses $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="buses-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bus_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capacity')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
