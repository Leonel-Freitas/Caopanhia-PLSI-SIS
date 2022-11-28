<?php

use common\models\Anuncios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\AnunciosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Anúncios';
?>
<div class="anuncios-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Os meus anuncios', ['indexpessoal'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="row">
    <?php foreach ($anuncios as $anuncio){
        $cao = \common\models\Caes::findOne($anuncio->idCao)
        ?>


        <div class="column">
            <div class="card">
                <?php echo Html::img('@web/images/caes/'. $cao->imagem) ?>
                <div class="container">
                    <h4><b><?php echo $cao->nome ?></b></h4>
                    <p><?php echo $anuncio->descricao ?></p>
                    <p><?= Html::a('Ver detalhes', ['anuncios/view', 'id' => $anuncio->id], ['class' => 'btn btn-success']) ?></p>
                </div>
            </div>
        </div>


    <?php } ?>
    </div>


</div>






<style>





</style>
