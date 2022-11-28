<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Caes $model */

$this->title = $model->nome;
?>
<div class="caes-view">


    <center>
        <?php echo Html::img('@web/images/caes/'. $model->imagem) ?>
    </center>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'anoNascimento',
            'genero',
            'microship',
            'castrado',
            [
                'label' => 'Raça',
                'value' => \common\models\Racas::findOne($model->idRaca)->designacao,
            ],
        ],
    ]) ?>

    <p>
        <?= Html::a('Voltar', ['marcacoesveterinarias/indexpedidos'], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Ver perfil do utilizador', ['user/viewclient', 'id' => $model->idUserProfile, 'idCao' => $model->id], ['class' => 'btn btn-info']) ?>
        <?= Html::a('Marcar consulta', ['marcacoesveterinarias/create', 'idCao' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

</div>
