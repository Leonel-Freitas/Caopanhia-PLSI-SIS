<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Distritos $model */

$this->title = 'Adicionar distrito';
$this->params['breadcrumbs'][] = ['label' => 'Distritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distritos-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
