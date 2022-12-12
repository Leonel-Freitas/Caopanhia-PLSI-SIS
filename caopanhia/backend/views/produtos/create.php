<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Produtos $model */

$this->title = 'Adicionar um novo Produto';
?>
<div class="produtos-create">

    <h5>Insira uma imagem do produto e preencha os campos</h5>


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
