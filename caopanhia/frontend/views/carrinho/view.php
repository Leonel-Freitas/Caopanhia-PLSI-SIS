<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Carrinho $produtosCarrinho */

$this->title = 'O meu carrinho';
$contador = 1;
$valorTotal = 0;
\yii\web\YiiAsset::register($this);
?>
<div class="carrinho-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Voltar a loja', ['produtos/index', 'filtro' => 0], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= common\widgets\Alert::widget()?>

    <?php if ($produtosCarrinho != null){ ?>

        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped"><thead><th><h3>#</h3></th><th><h3>Produto</h3></th><th><h3>Quantidade</h3></th><th><h3>Valor</h3></th><th><h3>Opcoes</h3></th></thead>
                    <tbody>
                    <?php foreach ($produtosCarrinho as $produto) { ?>
                        <tr>
                            <td><?= $contador++ ?></td>
                            <td><?= \common\models\Produtos::findOne($produto->idProduto)->designacao ?></td>
                            <td><?= $produto->quantidade ?></td>
                            <td><?= \common\models\Produtos::findOne($produto->idProduto)->valor.'€' ?></td>
                            <td>
                                <a href="<?=Url::to(['produtos/view', 'id' => $produto->idProduto])?>" class="btn btn-primary">Detalhes</a>
                                <a href="<?=Url::to(['update', 'idProduto' => $produto->idProduto])?>" class="btn btn-primary">Quantidade</a>
                                <?= Html::a('Remover', ['delete', 'idProduto' => $produto->idProduto], [
                                    'class' => 'btn btn-danger',
                                    'data' => ['method' => 'post',],
                                ]) ?>
                            </td>
                        </tr>

                    <?php $valorTotal = $valorTotal + (\common\models\Produtos::findOne($produto->idProduto)->valor * $produto->quantidade);  } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <br>
        <p>
            <h4>Valor a pagar: <?php echo $valorTotal.'€' ?></h4>
            <?= Html::a('Finalizar', ['encomendas/create'], ['class' => 'btn btn-primary']) ?>
        </p>

    <?php }else{ ?>

        <br><br>
        <h4>Ainda não possui nenhum item no carrinho!</h4>

    <?php } ?>

</div>
