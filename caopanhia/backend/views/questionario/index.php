<?php

use common\models\Questionario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $perguntas */

$this->title = 'Perguntas do questionário';
?>
<div class="questionario-index">

    <?= common\widgets\Alert::widget()?>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped"><thead><th><h3>Pergunta</h3></th><th><h3>Sim</h3></th><th><h3>Não</h3></th><th><h3>Opções</h3></th></thead>
                <tbody>
                <?php foreach ($perguntas as $pergunta) { ?>
                    <tr>
                        <td><?= $pergunta->pergunta ?></td>
                        <td><?= $pergunta->pontosSim.' pontos' ?></td>
                        <td><?=$pergunta->pontosNao.' pontos' ?></td>
                        <td>
                            <a href="<?=Url::to(['update', 'id' => $pergunta->id])?>" class="btn btn-info">Alterar pontos</a>
                            <?= Html::a('Remover', ['delete', 'id' => $pergunta->id], [
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

    <br><br>

    <p>
        <?= Html::a('Adicionar pergunta', ['create'], ['class' => 'btn btn-warning']) ?>
    </p>


</div>
