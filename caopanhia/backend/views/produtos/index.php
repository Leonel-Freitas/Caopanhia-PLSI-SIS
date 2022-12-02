<?php

use common\models\Produtos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\SearchProdutos $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Produtos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="produtos-index">

    <p>
        <?= Html::a('Create Produtos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= common\widgets\Alert::widget()?>

    <div class="row">
        <?php foreach ($produtos as $produto){


            ?>

            <div class="column">
                <div class="card">
                    <?php echo Html::img('/caopanhia/backend/web/images/produtos/'.$produto->imagem, ['id' => 'imageProduto']) ?>
                    <div class="container">
                        <h4><b><?php echo $produto->designacao ?></b></h4>
                        <h4><b><?php echo common\models\Categorias::find()->where(['id' => $produto->idCategoria])->one()->designacao ?></b></h4>
                        <p><?= Html::a('Ver detalhes', ['produtos/view', 'id' => $produto->id], ['class' => 'btn btn-success']) ?></p>
                    </div>
                </div>
            </div>


        <?php } ?>
    </div>


</div>




