<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\CaesSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="caes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'imagem') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'anoNascimento') ?>

    <?= $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'microship') ?>

    <?php // echo $form->field($model, 'castrado') ?>

    <?php // echo $form->field($model, 'pedidoConsulta') ?>

    <?php // echo $form->field($model, 'adotado') ?>

    <?php // echo $form->field($model, 'idUserProfile') ?>

    <?php // echo $form->field($model, 'idRaca') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
