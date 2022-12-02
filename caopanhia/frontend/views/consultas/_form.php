<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Consultas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="consultas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tratamento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diagonostico')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'notas')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
