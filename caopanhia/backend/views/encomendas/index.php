<?php

use common\models\Encomendas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $encomendasPendentes */
/** @var yii\data\ActiveDataProvider $encomendasEnviadas */
/** @var yii\data\ActiveDataProvider $encomendasEntregues */

$this->title = 'Encomendas';
?>
<div class="encomendas-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <h4>Encomendas pendentes:</h4>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped"><thead><th><h3>ID</h3></th><th><h3>Data</h3></th><th><h3>Valor total</h3></th><th><h3>Opções</h3></th></thead>
                <tbody>
                <?php foreach ($encomendasPendentes as $encomenda) { ?>
                    <tr>
                        <td><?= $encomenda->id ?></td>
                        <td><?= $encomenda->data ?></td>
                        <td><?= $encomenda->valorTotal.'€' ?></td>
                        <td>
                            <a href="<?=Url::to(['update', 'id' => $encomenda->id, 'estado' => $encomenda->estado])?>" class="btn btn-info">Confirmar envio</a>
                            <a href="<?=Url::to(['view', 'id' => $encomenda->id])?>" class="btn btn-warning">Ver detalhes</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <br><br>
    <h4>Encomendas enviadas:</h4>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped"><thead><th><h3>ID</h3></th><th><h3>Data</h3></th><th><h3>Valor total</h3></th><th><h3>Opções</h3></th></thead>
                <tbody>
                <?php foreach ($encomendasEnviadas as $encomenda) { ?>
                    <tr>
                        <td><?= $encomenda->id ?></td>
                        <td><?= $encomenda->data ?></td>
                        <td><?= $encomenda->valorTotal.'€' ?></td>
                        <td>
                            <a href="<?=Url::to(['update', 'id' => $encomenda->id, 'estado' => $encomenda->estado])?>" class="btn btn-info">Confirmar entrega</a>
                            <a href="<?=Url::to(['view', 'id' => $encomenda->id])?>" class="btn btn-warning">Ver detalhes</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <br><br>
    <h4>Encomendas entregues:</h4>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped"><thead><th><h3>ID</h3></th><th><h3>Data</h3></th><th><h3>Valor total</h3></th><th><h3>Opções</h3></th></thead>
                <tbody>
                <?php foreach ($encomendasEntregues as $encomenda) { ?>
                    <tr>
                        <td><?= $encomenda->id ?></td>
                        <td><?= $encomenda->data ?></td>
                        <td><?= $encomenda->valorTotal.'€' ?></td>
                        <td>
                            <a href="<?=Url::to(['view', 'id' => $encomenda->id])?>" class="btn btn-warning">Ver detalhes</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
