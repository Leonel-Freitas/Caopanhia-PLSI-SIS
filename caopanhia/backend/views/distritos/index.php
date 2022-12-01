<?php

use common\models\Distritos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\DistritosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lista de Distritos';
?>
<div class="distritos-index">
    <?= common\widgets\Alert::widget()?>

    <p>
        <?= Html::a('Adicionar distrito', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped"><thead><th><h3>Id</h3></th><th><h3>Designacao</h3></th><th><h3>Opcoes</h3></th></thead>
                <tbody>
                <?php foreach ($distritos as $distrito) { ?>
                    <tr>
                        <td><?= $distrito->id ?></td>
                        <td><?= $distrito->designacao ?></td>
                        <td>
                            <a href="<?=Url::to(['update', 'id' => $distrito->id])?>" class="btn btn-warning">Editar</a>
                            <?php if($distrito->status == 10){ ?>
                                <a href="<?=Url::to(['disable', 'id' => $distrito->id])?>" class="btn btn-danger">Desativar</a>
                            <?php }else{ ?>
                                <a href="<?=Url::to(['reactivate', 'id' => $distrito->id])?>" class="btn btn-danger">Reativar</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


</div>
