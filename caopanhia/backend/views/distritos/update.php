<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Distritos $model */

$this->title = 'Editar distrito: ' . $model->designacao;
$this->params['breadcrumbs'][] = ['label' => 'Distritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distritos-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
