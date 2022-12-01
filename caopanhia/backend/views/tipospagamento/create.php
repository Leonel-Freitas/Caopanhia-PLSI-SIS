<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Tipospagamento $model */

$this->title = 'Adicionar método de pagamento';
?>
<div class="tipospagamento-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
