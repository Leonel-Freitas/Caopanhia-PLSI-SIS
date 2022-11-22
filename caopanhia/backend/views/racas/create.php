<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Racas $model */

$this->title = 'Adicionar raça';
?>
<div class="racas-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
