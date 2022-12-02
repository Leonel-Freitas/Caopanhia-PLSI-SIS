<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Categorias $model */

$this->title = 'Update Categorias: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categorias-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
