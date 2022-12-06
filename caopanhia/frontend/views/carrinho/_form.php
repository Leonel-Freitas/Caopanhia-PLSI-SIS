<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $model */
/** @var yii\widgets\ActiveForm $form */


?>

<div class="carrinho-form">



    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'quantidade')?>

    <?= $form->field($model, 'valorPago')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
