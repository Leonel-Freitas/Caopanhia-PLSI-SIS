<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Questionario $model */

$this->title = 'Adicionar pergunta';
?>
<div class="questionario-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
