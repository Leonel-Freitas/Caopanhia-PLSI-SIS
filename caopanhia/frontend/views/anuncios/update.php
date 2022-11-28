<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Anuncios $model */

$this->title = 'Alterar dados de ' . $nomeCao;
?>
<div class="anuncios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
