<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Categorias $categorias */

$this->title = 'Filtrar pesquisa';
\yii\web\YiiAsset::register($this);
?>
<div class="produtos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">

        <div class="column">
            <div class="card">
                <div class="container">
                    <h4><b>Todos</b></h4>
                    <p><?= Html::a('Mostrar', ['produtos/index', 'filtro' => 0], ['class' => 'btn btn-success']) ?></p>
                </div>
            </div>
        </div>

        <?php foreach ($categorias as $categoria){ ?>

            <div class="column">
                <div class="card">
                    <div class="container">
                        <h4><b><?php echo $categoria->designacao ?></b></h4>
                        <p><?= Html::a('Mostrar', ['produtos/index', 'filtro' => $categoria->id], ['class' => 'btn btn-success']) ?></p>
                    </div>
                </div>
            </div>


        <?php } ?>
    </div>

    <br><br>

    <center>
        <?= Html::a('Voltar à loja', Yii::$app->request->referrer, ['class' => 'btn btn-primary']) ?>
    </center>


</div>

