<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\MarcacoesveterinariasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="marcacoesveterinarias-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'idClient') ?>

    <?= $form->field($model, 'idVet') ?>

    <?= $form->field($model, 'idCao') ?>

    <?php // echo $form->field($model, 'idConsulta') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
