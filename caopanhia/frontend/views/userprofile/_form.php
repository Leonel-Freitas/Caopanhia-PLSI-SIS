<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Userprofile $thisUser */
/** @var yii\widgets\ActiveForm $form */


?>

<div class="userprofile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($thisUser, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($thisUser, 'morada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($thisUser, 'codigoPostal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($thisUser, 'genero')->dropDownList(['masculino' => 'Masculino', 'feminino' => 'Feminino']) ?>

    <?= $form->field($thisUser, 'nif')->textInput() ?>

    <?= $form->field($thisUser, 'contacto')->textInput() ?>

    <?= $form->field($thisUser, 'idDistrito')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Distritos::find()->where(['status' => '10'])->asArray()->all(),'id', 'designacao'))->label('Distrito')?>

    <?= $form->field($thisUser, 'formacao')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Voltar', ['userprofile/view', 'id' => $thisUser->id] ,['class' => 'btn btn-danger'])?>
    </div>
    <div class=""

    </div>
    <?php ActiveForm::end(); ?>

</div>
