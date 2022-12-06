<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Categorias $model */

$this->title = 'Editar categoria: ' . $model->designacao;
?>
<div class="categorias-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
