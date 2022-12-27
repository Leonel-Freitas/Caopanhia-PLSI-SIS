<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Questionario $model */

$this->title = 'Editar pergunta: '. $model->pergunta;
?>
<div class="questionario-update">

    <?= $this->render('_formUpdate', [
        'model' => $model,
    ]) ?>

</div>
