<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Marcacoesveterinarias $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="marcacoesveterinarias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'hora')->textInput() ?>

    <?= $form->field($model, 'idClient')->textInput() ?>

    <?= $form->field($model, 'idVet')->textInput() ?>

    <?= $form->field($model, 'idCao')->textInput() ?>

    <?= $form->field($model, 'idConsulta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
