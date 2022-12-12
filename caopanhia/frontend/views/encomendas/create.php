<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Encomendas $encomenda */

$this->title = 'Finalizar encomenda';
?>
<div class="encomendas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'encomenda' => $encomenda,
        'metodosExpedicao' => $metodosExpedicao
    ]) ?>

</div>
