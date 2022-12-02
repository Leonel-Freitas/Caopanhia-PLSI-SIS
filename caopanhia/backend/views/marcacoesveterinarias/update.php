<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Marcacoesveterinarias $model */

$this->title = 'Editar horário da marcação da consulta ' . $model->id;
?>
<div class="marcacoesveterinarias-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
