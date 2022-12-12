<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Produtos $model */

$this->title = $model->designacao;
\yii\web\YiiAsset::register($this);
?>
<div class="produtos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <center>
        <img class="img" <?php echo Html::img(\yii\helpers\BaseUrl::to(Yii::$app->urlManagerBackend->baseUrl.'/produtos/'.$model->imagem), ['id' => 'imagemProduto'])?>
    </center>
    <br>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'designacao',
            [
                'label' => 'Valor',
                'value' => $model->valor.' €'
            ],
            [
                'label' => 'Categoria',
                'value' => \common\models\Categorias::findOne($model->idCategoria)->designacao
            ],
            'descricao'
        ],
    ]) ?>

    <?= Html::a('Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-primary']) ?>


</div>
