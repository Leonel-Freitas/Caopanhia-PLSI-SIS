<?php

use common\models\Userprofile;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Consultas $model */

$this->title = 'Detalhes da consulta '.$model->id;
\yii\web\YiiAsset::register($this);
?>
<div class="consultas-view">

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
        ],
    ]) ?>

    <br><h5>Detalhes:</h5>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tratamento',
            'diagonostico',
            'notas',
        ],
    ]) ?>

    <p>
        <?= Html::a('Voltar', ['marcacoesveterinarias/indexhistorico', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
