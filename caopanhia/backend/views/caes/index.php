<?php

use common\models\Caes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Caes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Caes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'imagem',
            'nome',
            'anoNascimento',
            'genero',
            //'microship',
            //'castrado',
            //'pedidoConsulta',
            //'adotado',
            //'idUserProfile',
            //'idRaca',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Caes $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>