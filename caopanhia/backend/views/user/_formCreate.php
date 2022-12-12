<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
    <?= $form->field($model, 'email') ?>
    <?= $form->field($model, 'password')->passwordInput() ?>

    <br><h3>Dados Pessoais:</h3>


    <?= $form->field($model, 'nome')->textInput() ?>
    <?= $form->field($model, 'genero')->dropDownList(['masculino' => 'Masculino', 'feminino' => 'Feminino']) ?>
    <?= $form->field($model, 'morada')->textInput() ?>
    <?= $form->field($model, 'codigoPostal')->textInput() ?>
    <?= $form->field($model, 'idDistrito')->dropDownList($distritos)->label('Distrito') ?>
    <?= $form->field($model, 'nif')->textInput() ?>
    <?= $form->field($model, 'contacto')->textInput() ?>
    <?php if ($role == 'vet'){ ?>
        <?= $form->field($model, 'formacao')->textInput() ?>
    <?php } ?>




    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        <?=  Html::a('Cancelar', ['index', 'role' => $role], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

