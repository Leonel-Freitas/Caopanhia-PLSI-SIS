<?php

use common\models\Anuncios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var common\models\Caes $caes */

$this->title = 'Pedidos de consultas';
?>
<div class="anuncios-index">

    <?= common\widgets\Alert::widget()?>


    <?php if ($caes == null){ ?>
        <br><br>
        <center><h3>Não existem pedidos de consultas, procure mais tarde!</h3></center>
    <?php } ?>

    <div class="row">
        <?php foreach ($caes as $cao){
            $user = \common\models\Userprofile::findOne($cao->idUserProfile);
            $distrito = \common\models\Distritos::findOne($user->idDistrito)->designacao;
            ?>

            <div class="column">
                <div class="card">
                    <?php echo Html::img(\yii\helpers\BaseUrl::to(Yii::$app->urlManagerFrontend->baseUrl.'/caes/'.$cao->imagem)) ?>
                    <div class="container">
                        <h4><b><?php echo $cao->nome ?></b></h4>
                        <p><?php echo $distrito ?></p>
                        <p><?= Html::a('Ver detalhes', ['caes/view', 'id' => $cao->id], ['class' => 'btn btn-success']) ?></p>
                    </div>
                </div>
            </div>


        <?php } ?>
    </div>


</div>






<style>

    .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 100%;
        height: 100%;
    }

    .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    }

    .container {
        padding: 2px 18px;
    }


    .column {
        float: left;
        width: 33%;
        padding: 0 10px;
    }

    /* Remove extra left and right margins, due to padding */
    .row {margin: 0 -5px;}

    /* Clear floats after the columns */
    .row:after {
        content: "";
        display: table;
        clear: both;
    }

    /* Responsive columns */
    @media screen and (max-width: 600px) {
        .column {
            width: 100%;
            display: block;
            margin-bottom: 20px;
        }
    }



</style>

