<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $model */

$this->title = 'Update Carrinho: ' . $model->idEncomenda;
$this->params['breadcrumbs'][] = ['label' => 'Carrinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEncomenda, 'url' => ['view', 'idEncomenda' => $model->idEncomenda, 'idProduto' => $model->idProduto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="carrinho-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
