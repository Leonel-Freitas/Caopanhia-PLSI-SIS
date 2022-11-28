<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Comentarios $model */

$this->title = 'Enviar mensagem';
?>
<div class="comentarios-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
