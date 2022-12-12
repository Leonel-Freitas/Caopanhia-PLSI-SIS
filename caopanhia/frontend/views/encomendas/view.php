<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $carrinho */
/** @var common\models\Encomendas $encomenda */
/** @var common\models\Produto $produtosCarrinho */

$this->title = 'Detalhes da encomenda #'. $carrinho[0]->idEncomenda;
\yii\web\YiiAsset::register($this);
$indice = 0;
?>
<div class="encomendas-view">

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped"><thead><th><h4>Produto</h4></th><th><h4>Designacao</h4></th><th><h4>Categoria</h4></th><th><h4>Quantidade</h4></th><th><h4>Valor por unidade</h4></th><th><h4>Valor total</h4></th><th></thead>
                <tbody>
                <?php foreach ($carrinho as $produto){ ?>
                    <tr>
                        <td><?php echo Html::img(\yii\helpers\BaseUrl::to(Yii::$app->urlManagerBackend->baseUrl.'/produtos/'.$produtosCarrinho[$indice]->imagem), ['style' => 'width:100px']) ?></td>
                        <td><?= $produtosCarrinho[$indice]->designacao ?></td>
                        <td><?= \common\models\Categorias::findOne($produtosCarrinho[$indice]->idCategoria)->designacao ?></td>
                        <td><?= $produto->quantidade ?></td>
                        <td><?= $produto->valorPago.'€' ?></td>
                        <td><?= number_format($produto->valorPago * $produto->quantidade, 2, '.','').'€' ?></td>
                    </tr>
                <?php $indice++; } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div style= "text-align: right">
        <h4>Custo de expedição: <?php echo \common\models\Tiposexpedicao::findOne($encomenda->idExpedicao)->custo.'€' ?></h4>
        <h4>Custo Total: <?php echo $encomenda->valorTotal.'€' ?></h4>
    </div>

    <?= Html::a('Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-primary']) ?>


</div>