<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Tipospagamento $model */

$this->title = 'Editar método de pagamento: ' . $model->designacao;
?>
<div class="tipospagamento-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
