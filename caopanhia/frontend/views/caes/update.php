<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Caes $model */

$this->title = 'Alterar dados de ' . $model->nome;
?>
<div class="caes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
