<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Racas $model */

$this->title = 'Editar: ' . $model->designacao;
?>
<div class="racas-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
