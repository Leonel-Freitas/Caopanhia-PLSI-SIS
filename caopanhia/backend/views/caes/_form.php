<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Caes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="caes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imagem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anoNascimento')->textInput() ?>

    <?= $form->field($model, 'genero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'microship')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'castrado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pedidoConsulta')->textInput() ?>

    <?= $form->field($model, 'adotado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idUserProfile')->textInput() ?>

    <?= $form->field($model, 'idRaca')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
