<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Caes $model */

$this->title = $model->nome;
?>
<div class="caes-view">


    <center>
        <?php echo Html::img(\yii\helpers\BaseUrl::to(Yii::$app->urlManagerFrontend->baseUrl.'/caes/'.$model->imagem)) ?>
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
        <?= Html::a('Voltar', Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
    </p>

</div>

