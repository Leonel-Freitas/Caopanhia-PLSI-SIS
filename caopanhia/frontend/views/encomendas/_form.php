<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Encomendas $encomenda */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="encomendas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($encomenda, 'idExpedicao')->dropDownList($metodosExpedicao)->label('Método de expedição')?>

    <?=$form->field($encomenda, 'idPagamento')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Tipospagamento::find()->asArray()->where(['status' => 10])->all(),'id', 'designacao'))->label('Método de Expedição') ?>

    <div class="form-group">
        <?= Html::submitButton('Finalizar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
