<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Comentarios $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="comentarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descricao')->textarea(['maxlength' => true])->label('Mensagem') ?>

    <br>
    <div class="form-group">
        <?= Html::submitButton('Enviar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
