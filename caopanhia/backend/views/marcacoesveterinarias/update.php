<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Marcacoesveterinarias $model */

$this->title = 'Update Marcacoesveterinarias: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Marcacoesveterinarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="marcacoesveterinarias-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
