<?php

use common\models\Categorias;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var yii\data\ActiveDataProvider $categorias */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categorias-index">



    <p>
        <?= Html::a('Create categorias', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= common\widgets\Alert::widget()?>

    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped"><thead><th><h3>Id</h3></th><th><h3>Designacao</h3></th><th><h3>Opcoes</h3></th></thead>
                <tbody>
                <?php foreach ($categorias as $categoria) { ?>
                    <tr>
                        <td><?= $categoria->id ?></td>
                        <td><?= $categoria->designacao ?></td>
                        <td>
                            <a href="<?=Url::to(['update', 'id' => $categoria->id])?>" class="btn btn-warning">Editar</a>
                            <?= Html::a('Remover', ['delete', 'id' => $categoria->id], [
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



</div>
