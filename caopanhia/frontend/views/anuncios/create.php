<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Anuncios $model */

$this->title = 'Criar anúncio';
?>
<div class="anuncios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <h5>Cão registado com sucesso! Insira agora uma breve descrição para o anúncio</h5>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
