<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Produtos $model */

$this->title = $model->designacao;
\yii\web\YiiAsset::register($this);
?>
<div class="produtos-view">

    <p>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Editar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Adicionar stock', ['stock', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php if ($model->status == 10){ ?>
            <?= Html::a('Desativar', ['update', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
        <?php }else{ ?>
            <?= Html::a('Ativar', ['update', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
        <?php } ?>
    </p>

    <center>
        <?php echo Html::img('@web/images/produtos/'. $model->imagem) ?>
    </center>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'designacao',
            [
                'label' => 'Valor',
                'value' => $model->valor.' €'
            ],
            'stock',
            [
                'label' => 'Categoria',
                'value' => \common\models\Categorias::findOne($model->idCategoria)->designacao
            ],
            'descricao'
        ],
    ]) ?>

</div>
