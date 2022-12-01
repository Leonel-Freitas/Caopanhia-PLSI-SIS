<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Consultas $model */

$this->title = 'Altarar dados da consulta ' . $model->id;
?>
<div class="consultas-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
