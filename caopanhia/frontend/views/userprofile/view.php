<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Userprofile $thisUser */


$this->title = $thisUser->nome;

\yii\web\YiiAsset::register($this);
?>
<div class="userprofile-view">
    <div class="userprofile-index">

        <section class="vh-150" style="background-color: #f4f5f7;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col col-lg-6 mb-4 mb-lg-0">
                        <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                                <div class="col-md-4 gradient-custom text-center text-black", id="perfil"
                                     style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem; ">
                                    <?php
                                    if ($thisUser->imagem){
                                        echo Html::img(\yii\helpers\BaseUrl::to('@web/images/User/'.$thisUser->imagem), ['class' => 'img-fluid my-5']);
                                    } else if ($thisUser->genero=='masculino'){
                                            echo Html::img('@web/images/userAvatar', ['class' => 'img-fluid my-3']) ;
                                        }else{
                                            echo Html::img('@web/images/userAvatarFemale', ['class' => 'img-fluid my-3','style'=>'width: 140px;' ]);
                                    }?>
                                    <h5><?=$thisUser->nome?></h5>
                                    <p><?=$thisUser->formacao?></p>
                                    <i class="far fa-edit mb-5"></i>
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body p-4">
                                        <h6>Informação Pessoal</h6>
                                        <hr class="mt-0 mb-4">
                                        <div class="row pt-1">
                                            <div class="col-6 mb-3">
                                                <h6>Email</h6>
                                                <p class="text-muted"><?=Yii::$app->user->identity->email?></p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Contacto</h6>
                                                <p class="text-muted"><?=$thisUser->contacto?></p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Genero</h6>
                                                <p class="text-muted"><?=$thisUser->genero?></p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>NIF</h6>
                                                <p class="text-muted"><?=$thisUser->nif?></p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Morada</h6>
                                                <p class="text-muted"><?=$thisUser->morada?></p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Codigo Postal</h6>
                                                <p class="text-muted"><?=$thisUser->codigoPostal?></p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <h6>Distrito</h6>
                                                <p class="text-muted">
                                                    <?= common\models\Distritos::find()->where(['id' => $thisUser->idDistrito])->one()->designacao ?></p>

                                            </div>

                                            <?= Html::a('Alterar Dados', ['update', 'id' => Yii::$app->user->identity->getId()] ,['class' => 'btn btn-primary']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>



    </div>


</div>
<style>
    #imagemPerfil
    {
        vertical-align: middle;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
</style>
