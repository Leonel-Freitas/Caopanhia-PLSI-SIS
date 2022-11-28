<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Userprofile $thisUser */



$this->title =   $thisUser->nome;

?>
<div class="userprofile-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'thisUser' => $thisUser,

    ]) ?>

</div>
