<?php

use common\models\Marcacoesveterinarias;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\MarcacoesveterinariasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Marcacoesveterinarias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marcacoesveterinarias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Marcacoesveterinarias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'data',
            'idClient',
            'idVet',
            'idCao',
            //'idConsulta',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Marcacoesveterinarias $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
