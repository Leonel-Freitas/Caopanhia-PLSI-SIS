<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Sign Up';
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= common\widgets\Alert::widget()?>

    <p>Por favor preencha os seguintes campos:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'password')->passwordInput() ?>

            <br><h3>Dados Pessoais:</h3>

            <?= $form->field($model, 'nome')->textInput() ?>
            <?= $form->field($model, 'genero')->dropDownList(['masculino' => 'Masculino', 'feminino' => 'Feminino']) ?>
            <?= $form->field($model, 'morada')->textInput() ?>
            <?= $form->field($model, 'codigoPostal')->textInput() ?>
            <?= $form->field($model, 'idDistrito')->dropDownList($distritos)->label('Distrito') ?>
            <?= $form->field($model, 'nif')->Input('number') ?>
            <?= $form->field($model, 'contacto')->textInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'id' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
