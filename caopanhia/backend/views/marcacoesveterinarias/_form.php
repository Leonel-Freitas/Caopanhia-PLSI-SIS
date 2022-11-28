<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Marcacoesveterinarias $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="marcacoesveterinarias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'data')->input('date') ?>
    <?= $form->field($model, 'hora')->input('time') ?>

    <div class="form-group">
        <?= Html::submitButton('Marcar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
