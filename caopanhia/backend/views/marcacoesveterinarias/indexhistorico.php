<?php

use common\models\Marcacoesveterinarias;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\Marcacoesveterinarias $marcacaoComConsulta */
/** @var common\models\Marcacoesveterinarias $marcacaoSemConsulta */


$this->title = 'Histórico de consultas';

?>
<div class="marcacoesveterinarias-index">


    <?php if (($marcacaoSemConsulta != null) || ($marcacaoComConsulta != null)){ ?>
        <?php if ($marcacaoSemConsulta != null){ ?>

            <h5>Consultas por detalhar:</h5>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped"><thead><th><h3>Consulta</h3></th><th><h3>Data</h3></th><th><h3>Hora</h3></th><th><h3>Cao</h3></th><th><h3>Cliente</h3></th><th><h3>Detalhes</h3></th></thead>
                        <tbody>
                        <?php foreach ($marcacaoSemConsulta as $marcacao) { ?>
                            <tr>
                                <td><?= $marcacao->idConsulta ?></td>
                                <td><?= $marcacao->data ?></td>
                                <td><?= $marcacao->hora ?></td>
                                <td><?= \common\models\Caes::find()->where(['id' => $marcacao->idCao])->one()->nome ?></td>
                                <td><?= \common\models\Userprofile::find()->where(['id' => $marcacao->idClient])->one()->nome ?></td>
                                <td>
                                    <a href="<?=Url::to(['user/viewclient', 'id' => $marcacao->idClient])?>" class="btn btn-info">Cliente</a>
                                    <a href="<?=Url::to(['caes/viewonly', 'id' => $marcacao->idCao])?>" class="btn btn-info">Cão</a>
                                    <a href="<?=Url::to(['consultas/view', 'id' => $marcacao->idConsulta])?>" class="btn btn-warning">Consulta</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } if ($marcacaoComConsulta != null){ ?>

            <h5>Consultas finalizadas:</h5>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-striped"><thead><th><h3>Consulta</h3></th><th><h3>Data</h3></th><th><h3>Hora</h3></th><th><h3>Cao</h3></th><th><h3>Cliente</h3></th><th><h3>Detalhes</h3></th></thead>
                        <tbody>
                        <?php foreach ($marcacaoComConsulta as $marcacao) { ?>
                            <tr>
                                <td><?= $marcacao->idConsulta ?></td>
                                <td><?= $marcacao->data ?></td>
                                <td><?= $marcacao->hora ?></td>
                                <td><?= \common\models\Caes::find()->where(['id' => $marcacao->idCao])->one()->nome ?></td>
                                <td><?= \common\models\Userprofile::find()->where(['id' => $marcacao->idClient])->one()->nome ?></td>
                                <td>
                                    <a href="<?=Url::to(['user/viewclient', 'id' => $marcacao->idClient])?>" class="btn btn-info">Cliente</a>
                                    <a href="<?=Url::to(['caes/viewonly', 'id' => $marcacao->idCao])?>" class="btn btn-info">Cão</a>
                                    <a href="<?=Url::to(['consultas/view', 'id' => $marcacao->idConsulta])?>" class="btn btn-warning">Consulta</a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php } ?>

    <?php }else{ ?>

        <br><br>
        <h4>Ainda não possui consultas realizadas!</h4>

    <?php } ?>


</div>

