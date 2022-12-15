<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use common\models\Userprofile;


$this->title = 'Sobre';

?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <body>
    <!-- Topbar Start -->
    <div class="container-fluid border-bottom d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-4 text-center py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Nossa Loja</h6>
                        <span>Rua 123, Leiria, Portugal</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center border-start border-end py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Envia um Email</h6>
                        <span>caopanhia@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center py-2">
                <div class="d-inline-flex align-items-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Liga-nos</h6>
                        <span>+351 123421842</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <?= Html::img('@web/images/about.jpg', ['class' => 'position-absolute w-100 h-100 rounded', 'style' => 'object-fit: cover'])?>

                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="border-start border-5 border-primary ps-5 mb-5">
                        <h6 class="text-primary text-uppercase">Sobre Nos</h6>
                        <h1 class="display-5 text-uppercase mb-0">Nós mantemos os cães felizes</h1>
                    </div>
                    <h4 class="text-body mb-4">A Cãopanhia é um sistema on-line com a finalidade de facilitar a adoção de cães através de anúncios bem estruturados. Qualquer utilizador poderá criar anúncios e/ou responder a anúncios já criados por outro utilizador.</h4>
                    <div class="bg-light p-4">
                        <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link text-uppercase w-100 active" id="pills-1-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1"
                                        aria-selected="true">Nossa missão</button>
                            </li>
                            <li class="nav-item w-50" role="presentation">
                                <button class="nav-link text-uppercase w-100" id="pills-2-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2"
                                        aria-selected="false">Nossa visão</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                                <p class="mb-0">A nossa missão será diminuir o abandono de animais nomeadamente cães com a nosso sistema de anuncios e com veterinarios prontos para acudir conseguiremos cuidar e tratar o seu animal de estimação </p>
                            </div>
                            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
                                <p class="mb-0">Ver um animal abandonado é triste e queremos ajudar o maior numero possivel de cães para que eles possam saborear a vida e ter um dono que consiga cuidar dele para serem melhores amigos durante anos. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->





    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="border-start border-5 border-primary ps-5 mb-5" style="max-width: 600px;">
                <h6 class="text-primary text-uppercase">Veterinarios</h6>
                <h1 class="display-5 text-uppercase mb-0">Profissionais qualificados para cuidado de animais</h1>
            </div>
            <div class="owl-carousel team-carousel position-relative" style="padding-right: 25px;">
                <?php foreach (Userprofile::find()->where(['!=', 'formacao', 'null'])->all()  as $team) {?>
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <?php if(($team->imagem)==null) { ?>
                            <?= Html::img('@web/images/vet.jpg');?>
                                <?php }else { ?>
                               <?= Html::img(\yii\helpers\BaseUrl::to(Yii::$app->urlManagerBackend->baseUrl.'/user/'.$team->imagem), ['class' => 'img-fluid w-100']);?>

                           <?php }?>

                            <div class="team-overlay">
                            <div class="d-flex align-items-center justify-content-start">

                                <a class="btn btn-light btn-square mx-1" style="width:80px; height:70px" <?= Html::a(' Profile <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
</svg>', ['userprofile/viewprofile', 'id' =>$team->id])?></a>

                            </div>
                            </div>
                        </div>
                        <div class="bg-light text-center p-4">
                            <h5 class="text-uppercase"><?= $team->nome ?></h5>

                        </div>
                     </div>
                    <?php }?>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>


    <?= Html::jsFile('@web/assets/owlcarousel/owl.carousel.min.js')?>


    <!-- Template Javascript -->
    <?= Html::jsFile('@web/jQuery/main.js')?>





</div>


