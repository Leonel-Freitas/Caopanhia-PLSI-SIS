<?php

use common\models\Tiposexpedicao;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $tiposExpedicao */

$this->title = 'Métodos de expedição';
?>
<div class="tipospagamento-index">

    <p>
        <?= Html::a('Adicionar um novo método', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped"><thead><th><h3>Id</h3></th><th><h3>Designacao</h3></th><th><h3>Duração</h3></th><th><h3>Custo</h3></th><th><h3>Ativo</h3></th><th><h3>Opcoes</h3></th></thead>
                <tbody>
                <?php foreach ($tiposExpedicao as $tipoExpedicao) { ?>
                    <tr>
                        <td><?= $tipoExpedicao->id ?></td>
                        <td><?= $tipoExpedicao->designacao ?></td>
                        <td><?= $tipoExpedicao->tempoMedio. ' dias' ?></td>
                        <td><?= $tipoExpedicao->custo.' €' ?></td>
                        <?php if($tipoExpedicao->status == 10){ ?>
                            <td>Sim</td>
                        <?php }else{ ?>
                            <td>Não</td>
                        <?php } ?>
                        <td>
                            <a href="<?=Url::to(['update', 'id' => $tipoExpedicao->id])?>" class="btn btn-warning">Editar</a>
                            <?php if($tipoExpedicao->status == 10){ ?>
                                <a href="<?=Url::to(['disable', 'id' => $tipoExpedicao->id])?>" class="btn btn-danger">Desativar</a>
                            <?php }else{ ?>
                                <a href="<?=Url::to(['reactivate', 'id' => $tipoExpedicao->id])?>" class="btn btn-danger">Reativar</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
