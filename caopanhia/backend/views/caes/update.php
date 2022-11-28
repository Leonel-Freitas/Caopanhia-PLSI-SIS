<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Caes $model */

$this->title = 'Update Caes: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Caes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="caes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
