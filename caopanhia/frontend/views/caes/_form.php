<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Caes $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="caes-form">

    <?php $form = ActiveForm::begin(); ?>

    <h5>Insira uma imagem do cão e preencha os campos com os dados do cão</h5>

    <?= $form->field($model, 'imageFile')->fileInput()->label('') ?>

    <br>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anoNascimento')->textInput(['type' => 'number', 'value' => date('Y'), 'max' => date('Y')])->label('Ano de Nascimento') ?>

    <?= $form->field($model, 'genero')->dropDownList(['macho' => 'Macho', 'femea' => 'Femea']) ?>

    <?= $form->field($model, 'microship')->dropDownList(['sim' => 'Sim', 'nao' => 'Não']) ?>

    <?= $form->field($model, 'castrado')->dropDownList(['sim' => 'Sim', 'nao' => 'Não']) ?>

    <?= $form->field($model, 'idRaca')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Racas::find()->asArray()->all(), 'id', 'designacao'))->label('Raça') ?>

    <br><br>

    <div class="form-group">
        <?= Html::submitButton('Seguinte', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
