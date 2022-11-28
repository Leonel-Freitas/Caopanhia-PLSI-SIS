<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Marcacoesveterinarias $model */

$this->title = 'Create Marcacoesveterinarias';
$this->params['breadcrumbs'][] = ['label' => 'Marcacoesveterinarias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcacoesveterinarias-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
