<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Categorias $model */

$this->title = 'Create Categorias';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
