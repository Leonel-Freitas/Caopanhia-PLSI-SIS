<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Produtos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="produtos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imagem')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'designacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor')->textInput() ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?= $form->field($model, 'idCategoria')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
