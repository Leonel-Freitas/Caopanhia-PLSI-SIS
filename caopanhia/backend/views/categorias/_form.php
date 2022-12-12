<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Categorias $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="categorias-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'designacao')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
