<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Produtos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="produtos-form">

    <?php $form = ActiveForm::begin(); ?>

    <h5>Insira uma imagem do produto e preencha os campos</h5>

    <?= $form->field($model, 'imageFile')->fileInput()->label('') ?>

    <?= $form->field($model, 'designacao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'valor')->textInput(['step' => 'any']) ?>

    <?= $form->field($model, 'stock')->textInput() ?>

    <?=     $form->field($model, 'idCategoria')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Categorias::find()->asArray()->all(),'id', 'designacao'))->label('Categoria') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
