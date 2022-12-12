<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EncomendasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="encomendas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'valorTotal') ?>

    <?= $form->field($model, 'data') ?>

    <?= $form->field($model, 'finalizada') ?>

    <?= $form->field($model, 'idExpedicao') ?>

    <?php // echo $form->field($model, 'idPagamento') ?>

    <?php // echo $form->field($model, 'idUser') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
