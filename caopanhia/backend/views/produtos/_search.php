<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\SearchProdutos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="produtos-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'imagem') ?>

    <?= $form->field($model, 'designacao') ?>

    <?= $form->field($model, 'valor') ?>

    <?= $form->field($model, 'stock') ?>

    <?php // echo $form->field($model, 'idCategoria') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
