<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Distritos $model */

$this->title = 'Editar distrito: ' . $model->designacao;
?>
<div class="distritos-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
