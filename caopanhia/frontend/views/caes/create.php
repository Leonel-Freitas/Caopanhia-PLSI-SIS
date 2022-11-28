<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Caes $model */
$this->title = 'Criar anúncio';
?>
<div class="caes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
