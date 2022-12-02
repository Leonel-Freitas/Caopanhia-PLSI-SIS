<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Consultas $model */

$this->title = 'Create Consultas';
$this->params['breadcrumbs'][] = ['label' => 'Consultas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consultas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
