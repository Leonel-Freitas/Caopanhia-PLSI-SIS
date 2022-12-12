<?php

use common\models\Encomendas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $encomendas */

$this->title = 'Histórico de encomendas';
?>
<div class="encomendas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($encomendas != null){ ?>

        <div class="row">
            <div class="col-sm-12">
                <table class="table table-striped"><thead><th><h4>#</h4></th><th><h4>Data</h4></th><th><h4>Valor pago</h4></th><th><h4>Nº produtos</h4></th><th><h4>M. expedição</h4></th><th><h4>M. pagamento</h4></th><th><h4>Estado</h4></th><th><h4>Detalhes</h4></th></thead>
                    <tbody>
                    <?php foreach ($encomendas as $encomenda) { ?>
                        <tr>
                            <td><?= $encomenda->id ?></td>
                            <td><?= $encomenda->data ?></td>
                            <td><?= $encomenda->valorTotal.'€' ?></td>
                            <td><?= count(\common\models\Carrinho::find()->where(['idEncomenda' => $encomenda->id])->all()) ?></td>
                            <td><?= \common\models\Tiposexpedicao::find()->where(['id' => $encomenda->idExpedicao])->one()->designacao ?></td>
                            <td><?= \common\models\Tipospagamento::find()->where(['id' => $encomenda->idPagamento])->one()->designacao ?></td>
                            <td><?= $encomenda->estado ?></td>

                            <td>
                                <a href="<?=Url::to(['view', 'id' => $encomenda->id])?>" class="btn btn-warning">Ver</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

    <?php }else{ ?>

        <br><br>
        <h4>Ainda não possui nenhuma encomenda realizada!</h4>

    <?php } ?>

    <?= Html::a('Voltar', ['produtos/index'], ['class' => 'btn btn-primary']) ?>


</div>
