<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

$this->title = 'Login'
?>
<div class="card">
    <div class="card-body login-card-body">
        <center>
            <h1 class="login-box-msg">Bem vindo à Caopanhia</h1>
            <h1 class="login-box-msg">Iniciar sessão:</h1>
        </center>

        <br><br>

        <?= common\widgets\Alert::widget()?>
        <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>


        <?= $form->field($model,'username')
            ->label('Username:')
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <br>

        <?= $form->field($model, 'password')
            ->label('Password:')
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <br>

            <div class="col-8">
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => '<div class="icheck-primary">{input}{label}</div>',
                    'labelOptions' => [
                        'class' => ''
                    ],
                    'uncheck' => null
                ]) ?>
            </div>
        <center>
            <div class="col-4">
                <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
            </div>
        </center>


        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-card-body -->
</div>