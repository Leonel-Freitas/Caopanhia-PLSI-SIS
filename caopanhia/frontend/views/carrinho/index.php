<?php

use common\models\Carrinho;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Carrinhos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrinho-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Carrinho', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idEncomenda',
            'idProduto',
            'quantidade',
            'valorPago',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Carrinho $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'idEncomenda' => $model->idEncomenda, 'idProduto' => $model->idProduto]);
                 }
            ],
        ],
    ]); ?>


</div>
