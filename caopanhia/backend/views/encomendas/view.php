<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Encomendas $model */

$this->title = 'Encomenda #'. $model->id;
\yii\web\YiiAsset::register($this);
$indice = 0;
?>
<div class="encomendas-view">

    <p>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Ver perfil do cliente', ['user/viewclient', 'id' => $model->idUser], ['class' => 'btn btn-warning']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'estado',
            'data',
            [
                'label' => 'Valor pago',
                'value' => $model->valorTotal.'€'
            ],
            [
                'label' => 'Método de expedição',
                'value' => \common\models\Tiposexpedicao::findOne($model->idExpedicao)->designacao,
            ],
        ],
    ]) ?>

    <br><br>
    <ol><h4>Produtos encomendados:</h4></ol>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped"><thead><th><h4>Produto</h4></th><th><h4>Designacao</h4></th><th><h4>Categoria</h4></th><th><h4>Quantidade</h4></th><th><h4>Valor por unidade</h4></th><th><h4>Valor total</h4></th><th></thead>
                <tbody>
                <?php foreach ($carrinho as $produto){ ?>
                    <tr>
                        <td><?php echo Html::img('/caopanhia/backend/web/images/produtos/'.$produtosCarrinho[$indice]->imagem, ['style' => 'width:100px']) ?></td>
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

    <br><br>
    <ol><h4>Detalhes de pagamento:</h4></ol>
            <table class="table">
                <tbody>
                    <tr>
                        <td>Método de pagamento</td>
                        <td><?= \common\models\Tipospagamento::findOne($model->idPagamento)->designacao ?></td>
                    </tr>
                    <tr>
                        <td>Custo total dos produtos</td>
                        <td><?= ($model->valorTotal - \common\models\Tiposexpedicao::findOne($model->idExpedicao)->custo).'€' ?></td>
                    </tr>
                    <tr>
                        <td>Custo do método de expedição</td>
                        <td><?=  \common\models\Tiposexpedicao::findOne($model->idExpedicao)->custo.'€'?></td>
                    </tr>
                        <tr>
                            <td><b>Custo total</b></td>
                            <td><b><?= $model->valorTotal.'€' ?></b></td>
                        </tr>
                </tbody>
            </table>

</div>
