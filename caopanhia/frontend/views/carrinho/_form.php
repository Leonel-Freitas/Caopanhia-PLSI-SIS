<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $model */
/** @var yii\widgets\ActiveForm $form */


?>

<div class="carrinho-form">



    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'quantidade')->textInput(['type' => 'number'])?>


    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
