<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Tiposexpedicao $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tiposexpedicao-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'designacao')->textInput(['maxlength' => true])->label('Designação') ?>

    <?= $form->field($model, 'custo')->textInput()->label('Custo') ?>

    <?= $form->field($model, 'tempoMedio')->textInput()->label('Duração em dias') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
