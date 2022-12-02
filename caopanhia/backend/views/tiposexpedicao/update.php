<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Tiposexpedicao $model */

$this->title = 'Editar método de pagamento: ' . $model->designacao;
?>
<div class="tiposexpedicao-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
