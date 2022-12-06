<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Produtos $model */

$this->title = 'Editar ' . $model->designacao;
?>
<div class="produtos-update">

    <?= $this->render('_formupdate', [
        'model' => $model,
    ]) ?>

</div>
