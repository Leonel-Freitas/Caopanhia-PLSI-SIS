<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Encomendas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="encomendas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'valorTotal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data')->textInput() ?>

    <?= $form->field($model, 'finalizada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idExpedicao')->textInput() ?>

    <?= $form->field($model, 'idPagamento')->textInput() ?>

    <?= $form->field($model, 'idUser')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
