<?php

use common\models\Comentarios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\Comentarios $comentarios */
$contador = 1;

$this->title = 'Mensagens';
?>
<div class="comentarios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if ($comentarios != null){ ?>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped"><thead><th><h3>#</h3></th><th><h3>Mensagem</h3></th><th><h3>Opcoes</h3></th></thead>
                <tbody>
                <?php foreach ($comentarios as $comentario) { ?>
                    <tr>
                        <td><?= $contador++ ?></td>
                        <td><?= $comentario->descricao ?></td>
                        <td>
                            <a href="<?=Url::to(['userprofile/viewprofile', 'id' => $comentario->idUser])?>" class="btn btn-primary">Visualizar perfil</a>
                            <a href="<?=Url::to(['anuncios/adotar', 'id' => $comentario->idAnuncio, 'idUser' => $comentario->idUser])?>" class="btn btn-success">Doar</a>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php }else{ ?>

        <br><br>
        <h4>Ainda nenhum utilizador respondeu ao seu anuncio... verifique mais tarde!</h4>

    <?php } ?>

    <p>
        <?= Html::a('Voltar', ['anuncios/view', 'id' => $idAnuncio], ['class' => 'btn btn-warning']) ?>
    </p>


</div>
