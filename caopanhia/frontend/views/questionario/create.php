<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Questionario $model */

$this->title = $contador.'º Pergunta';
?>
<div class="questionario-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <h3><?= $pergunta->pergunta ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
