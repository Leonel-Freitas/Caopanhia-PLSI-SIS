<?php

use common\models\Userprofile;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Anuncios $anuncio */
/** @var \common\models\Caes $cao */

$this->title = $cao->nome;
\yii\web\YiiAsset::register($this);
?>
<div class="anuncios-view">

    <?= common\widgets\Alert::widget()?>

    <h1><?= Html::encode($this->title) ?></h1>

    <center>
        <?php echo Html::img('@web/images/caes/'. $cao->imagem) ?>
    </center>


    <?= DetailView::widget([
        'model' => $cao,
        'attributes' => [
            'anoNascimento',
            'genero',
            'microship',
            'castrado',
            [
                'label' => 'Raça',
                'value' => \common\models\Racas::findOne($cao->idRaca)->designacao,
            ],
            [
                'label' => 'Utilizador associado',
                'value' => Userprofile::find()->where(['id' => $anuncio->idUser])->one()->nome
            ],
            [
                'label' => 'Descrição',
                'value' => $anuncio->descricao,
            ],
            [
                'label' => 'Data de criação',
                'value' => $anuncio->dataCriacao,
            ],
        ],
    ]) ?>

    <?php if ($anuncio->idUser == Userprofile::find()->where(['idUser' => Yii::$app->user->getId()])->one()->id)  {  ?>
        <p>
            <?= Html::a('Voltar', ['indexpessoal'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('Editar', ['caes/update', 'id' => $cao->id, 'idAnuncio' => $anuncio->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Ver mensagens', ['comentarios/index', 'idAnuncio' => $anuncio->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Solicitar marcação veterinária', ['caes/solicitarmarcacao', 'id' => $cao->id ,'idAnuncio' => $anuncio->id], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Apagar', ['delete', 'id' => $anuncio->id, 'idCao' => $cao->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem a certeza que pretende apagar este anuncio? O cão também será eliminado.',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    <?php }else{ ?>
        <p>
            <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-warning']) ?>
            <?= Html::a('Ver detalhes do dono', ['USER/view', 'id' => $anuncio->idUser], ['class' => 'btn btn-success']) ?>
            <?= Html::a('Enviar mensagem', ['comentarios/create', 'idAnuncio' => $anuncio->id], ['class' => 'btn btn-danger']) ?>
        </p>

    <?php } ?>

</div>
