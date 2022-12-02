<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Tiposexpedicao $model */

$this->title = 'Adicionar método de expedição';
?>
<div class="tiposexpedicao-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
