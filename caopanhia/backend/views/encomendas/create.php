<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Encomendas $model */

$this->title = 'Create Encomendas';
$this->params['breadcrumbs'][] = ['label' => 'Encomendas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encomendas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
