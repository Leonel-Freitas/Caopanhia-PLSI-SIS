<?php

use yii\helpers\Html;

$this->title = 'Editar detalhes de: ' . $model->nome;
?>
<div class="user-update">

    <?= $this->render('_form', [
        'model' => $model,
        'distritos' => $distritos,
        'user' => $user,
        'role' => $role,
    ]) ?>

</div>
