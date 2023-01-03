<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Questionario $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="questionario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pontosSim')->Input("number")->label('Pontos para Sim') ?>

    <?= $form->field($model, 'pontosNao')->Input("number")->label('Pontos para Não') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
