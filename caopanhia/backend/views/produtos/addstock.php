<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Produtos $model */

$this->title = 'Adicionar stock a ' . $model->designacao;
?>
<div class="produtos-update">

    <div class="produtos-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'toAddStock')->textInput(['type' => 'number', 'value' => 0])->label('Stock a adicionar') ?>

        <div class="form-group">
            <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
