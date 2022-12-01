<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Consultas $model */

$this->title = 'Detalhes da consulta '. $model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="consultas-view">

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tratamento',
            'diagonostico',
            'notas',
        ],
    ]) ?>

    <p>
        <?= Html::a('Voltar', ['marcacoesveterinarias/indexhistorico'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Alterar dados', ['update', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

</div>
