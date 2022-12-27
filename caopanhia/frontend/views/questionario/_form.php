<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Questionario $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="questionario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'resposta')->dropDownList(['sim' => 'Sim', 'nao' => 'Não']) ?>

    <div class="form-group">
        <?= Html::submitButton('Avançar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
