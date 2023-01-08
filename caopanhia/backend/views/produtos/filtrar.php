<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Categorias $categorias */

$this->title = 'Filtrar pesquisa por:';
\yii\web\YiiAsset::register($this);
?>
<div class="produtos-view">
    <div class="row">

        <div class="box green">
            <h3>Todos</h3>
            <p><?= Html::a('Mostrar', ['produtos/index', 'filtro' => 0], ['class' => 'btn btn-success']) ?></p>
        </div>

        <?php foreach ($categorias as $categoria){ ?>


            <div class="box green">
                <h3><?php echo $categoria->designacao ?></h3>
                <p><?= Html::a('Mostrar', ['produtos/index', 'filtro' => $categoria->id], ['class' => 'btn btn-success']) ?></p>
            </div>



        <?php } ?>
    </div>

    <br><br>

    <center>
        <?= Html::a('Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
    </center>


</div>














<style>





    .box {
        border-radius: 5px;
        box-shadow: 0px 30px 40px -20px var(--grayishBlue);
        padding: 30px;
        margin: 20px;
    }


    @media (max-width: 450px) {
        .box {
            height: 200px;
        }
    }

    @media (max-width: 950px) and (min-width: 450px) {
        .box {
            text-align: center;
            height: 180px;
        }
    }

    .green {
        border-top: 3px solid var(--green);
    }


    @media (min-width: 950px) {
        .row1-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .row2-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .box-down {
            position: relative;
            top: 150px;
        }
        .box {
            width: 20%;

        }
        .header p {
            width: 30%;
        }

    }

</style>

