<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $userProfile->nome;

\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

        <?= DetailView::widget([
            'model' => $userProfile,
            'attributes' => [
                [
                    'label' => 'Email',
                    'value' => $email,
                ],
                'genero',
                'morada',
                'codigoPostal',
                [
                    'label' => 'Distrito',
                    'value' => $distrito,
                ],
                'nif',
                'contacto',

            ],
        ]) ?>

    <p>
        <?= Html::a('Voltar',  Yii::$app->request->referrer, ['class' => 'btn btn-warning']) ?>
    </p>

</div>

