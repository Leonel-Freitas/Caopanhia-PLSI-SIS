<?php

use common\models\Racas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\RacasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Raças';
?>
<div class="racas-index">

    <p>
        <?= Html::a('Adicionar raça', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= common\widgets\Alert::widget()?>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped"><thead><th><h3>Id</h3></th><th><h3>Designacao</h3></th><th><h3>Pontos</h3></th><th><h3>Opcoes</h3></th></thead>
                <tbody>
                <?php foreach ($racas as $raca) { ?>
                    <tr>
                        <td><?= $raca->id ?></td>
                        <td><?= $raca->designacao ?></td>
                        <td><?= $raca->pontos ?></td>
                        <td>
                            <a href="<?=Url::to(['update', 'id' => $raca->id])?>" class="btn btn-warning">Editar</a>
                            <?= Html::a('Remover', ['delete', 'id' => $raca->id], [
                                'class' => 'btn btn-danger',
                                'data' => ['method' => 'post',],
                            ]) ?>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <br><h3>Sistema de pontos</h3><br>


        <div class="col-sm-12">
            <table class="table"><thead><th><h3>Pontos</h3></th><th><h3>Descrição</h3></th></thead>
                <tbody>
                    <tr>
                        <td>0</td>
                        <td>Cão pequeno impetuoso</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>Cão pequeno de guarda</td>
                    </tr>
                    <tr>
                        <td>20</td>
                        <td>Cão pequeno</td>
                    </tr>
                    <tr>
                        <td>30</td>
                        <td>Cão pequeno brincalhão</td>
                    </tr>
                    <tr>
                        <td>40</td>
                        <td>Cão pequeno de familia</td>
                    </tr>
                    <tr>
                        <td>50</td>
                        <td>Cão grande impetuoso</td>
                    </tr>
                    <tr>
                        <td>60</td>
                        <td>Cão grande de guarda</td>
                    </tr>
                    <tr>
                        <td>70</td>
                        <td>Cão grande</td>
                    </tr>
                    <tr>
                        <td>80</td>
                        <td>Cão grande brincalhão</td>
                    </tr>
                    <tr>
                        <td>90</td>
                        <td>Cão grande de familia</td>
                    </tr>
                </tbody>
            </table>
        </div>


</div>
