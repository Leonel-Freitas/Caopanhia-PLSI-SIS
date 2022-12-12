<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Categorias $model */

$this->title = 'Criar categoria';
?>
<div class="categorias-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
