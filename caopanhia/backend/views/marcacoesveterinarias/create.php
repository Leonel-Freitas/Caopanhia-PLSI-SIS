<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Marcacoesveterinarias $model */

$this->title = 'Marcar consulta';
?>
<div class="marcacoesveterinarias-create">

    <h5>Insira a data e hora da consulta</h5>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
