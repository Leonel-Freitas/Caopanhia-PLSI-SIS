<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $userProfile->nome;
\yii\web\YiiAsset::register($this);
?>
<div class="user-view">

    <?php if ($role == 'vet'){ ?>
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
            'formacao',

        ],
    ]) ?>
    <?php }else{ ?>
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
    <?php } ?>

    <p>
        <?= Html::a('Editar', ['update', 'id' => $userProfile->idUser, 'role' => $role], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Voltar', ['index', 'role' => $role], ['class' => 'btn btn-warning']) ?>
    </p>

</div>
