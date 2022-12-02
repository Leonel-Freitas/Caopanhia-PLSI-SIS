<?php

use common\models\Tipospagamento;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $tiposPagamento */

$this->title = 'Métodos de pagamento';
?>
<div class="tipospagamento-index">

    <p>
        <?= Html::a('Adicionar um novo método', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped"><thead><th><h3>Id</h3></th><th><h3>Designacao</h3></th><th><h3>Ativo</h3></th><th><h3>Opcoes</h3></th></thead>
                <tbody>
                <?php foreach ($tiposPagamento as $tipoPagamento) { ?>
                    <tr>
                        <td><?= $tipoPagamento->id ?></td>
                        <td><?= $tipoPagamento->designacao ?></td>
                        <?php if($tipoPagamento->status == 10){ ?>
                            <td>Sim</td>
                        <?php }else{ ?>
                            <td>Não</td>
                        <?php } ?>
                        <td>
                            <a href="<?=Url::to(['update', 'id' => $tipoPagamento->id])?>" class="btn btn-warning">Editar</a>
                            <?php if($tipoPagamento->status == 10){ ?>
                                <a href="<?=Url::to(['disable', 'id' => $tipoPagamento->id])?>" class="btn btn-danger">Desativar</a>
                            <?php }else{ ?>
                                <a href="<?=Url::to(['reactivate', 'id' => $tipoPagamento->id])?>" class="btn btn-danger">Reativar</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
