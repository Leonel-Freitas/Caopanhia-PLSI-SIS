<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Produtos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="produtos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imageFile')->fileInput()->label('') ?>

    <?= $form->field($model, 'designacao')->textInput(['maxlength' => true])->label('Desingação') ?>

    <?= $form->field($model, 'valor')->textInput(['step' => 'any'])->label('Valor') ?>

    <?=$form->field($model, 'idCategoria')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Categorias::find()->asArray()->all(),'id', 'designacao'))->label('Categoria') ?>

    <?= $form->field($model, 'descricao')->textarea(['maxlength' => true])->label('Descrição') ?>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

