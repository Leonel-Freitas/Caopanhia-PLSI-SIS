<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $model */


$this->title = 'Create Carrinho';
$this->params['breadcrumbs'][] = ['label' => 'Carrinhos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrinho-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,

    ]) ?>

</div>
