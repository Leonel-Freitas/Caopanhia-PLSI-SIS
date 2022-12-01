<?php

use common\models\Marcacoesveterinarias;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $marcacoes */

$this->title = 'Consultas marcadas';
?>
<div class="marcacoesveterinarias-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Voltar', ['anuncios/indexpessoal'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Histórico de consultas', ['indexhistorico'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php if ($marcacoes != null){ ?>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped"><thead><th><h3>Consulta</h3></th><th><h3>Data</h3></th><th><h3>Hora</h3></th><th><h3>Cao</h3></th><th><h3>Veterinário</h3></th><th><h3>Opções</h3></th></thead>
                <tbody>
                <?php foreach ($marcacoes as $marcacao) { ?>
                    <tr>
                        <td><?= $marcacao->idConsulta ?></td>
                        <td><?= $marcacao->data ?></td>
                        <td><?= $marcacao->hora ?></td>
                        <td><?= \common\models\Caes::find()->where(['id' => $marcacao->idCao])->one()->nome ?></td>
                        <td><?= \common\models\Userprofile::find()->where(['id' => $marcacao->idVet])->one()->nome ?></td>
                        <td>
                            <a href="<?=Url::to(['userprofile/viewprofile', 'id' => $marcacao->idVet])?>" class="btn btn-warning">Detalhes do veterinário</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php }else{ ?>

        <br><br>
        <h4>Ainda não possui consultas marcadas... verifique mais tarde!</h4>

    <?php } ?>


</div>
