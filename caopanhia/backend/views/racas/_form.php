<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Racas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="racas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'designacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pontos')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'status')->textInput()->hiddenInput(['value'=>10])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
