<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Caes $model */

$this->title = 'Create Caes';
$this->params['breadcrumbs'][] = ['label' => 'Caes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caes-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
