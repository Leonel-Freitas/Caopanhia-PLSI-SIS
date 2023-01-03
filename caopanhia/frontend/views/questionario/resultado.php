<?php

use common\models\Questionario;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $raca */

$this->title = 'Resultado';
?>
<div class="questionario-index">

    <br><br><br><br>

    <p><center>
            Os resultados mostram que a raça que mais dequa a si é:
            <h5><?= $raca[0]->designacao ?></h5>
    </center></p>


    <div class="contain">
        <div class="congrats">
            <h1><?= Html::encode($this->title) ?></h1>
            <br>
            <div class="done">
                <svg version="1.1" id="tick" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                     viewBox="0 0 37 37" style="enable-background:new 0 0 37 37;" xml:space="preserve">
<path class="circ path" style="fill:#e28743;stroke:#e28743;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" d="
	M30.5,6.5L30.5,6.5c6.6,6.6,6.6,17.4,0,24l0,0c-6.6,6.6-17.4,6.6-24,0l0,0c-6.6-6.6-6.6-17.4,0-24l0,0C13.1-0.2,23.9-0.2,30.5,6.5z"
/>
                    <polyline class="tick path" style="fill:none;stroke:#fff;stroke-width:3;stroke-linejoin:round;stroke-miterlimit:10;" points="
	11.6,20 15.9,24.2 26.4,13.8 "/>
</svg>
            </div>
            <div class="text">
                <p>Os resultados mostram que a raça que mais dequa a si é:</p>
            </div>
            <p class="regards"><?= $raca[0]->designacao ?></p>
            <p>
                <?= Html::a('Consulte os nossos anúncios', ['anuncios/index'], ['class' => 'btn btn-warning']) ?>
            </p>
        </div>
    </div>





</div>


<style>

    body{
        width:100%;
        height:100%;

    }

    .done{
        width:100px;
        height:100px;
        position:relative;
        left: 0;
        right: 0;
        top:-20px;
        margin:auto;
    }
    .contain h1{
        font-family: 'Julius Sans One', sans-serif;
        font-size:1.4em;
        color: #e28743;
    }

    .congrats{
        position:relative;
        left:50%;
        top:50%;
        max-width:800px;	transform:translate(-50%,-50%);
        width:80%;
        min-height:300px;
        max-height:900px;
        border:2px solid white;
        border-radius:5px;
        box-shadow: 12px 15px 20px 0 rgba(46,61,73,.3);
        background-image: linear-gradient(to bottom right,##e28743,##e28743);
        background:#fff;
        text-align:center;
        font-size:2em;
        color: #e28743;
    }

    .text{
        position:relative;
        font-weight:normal;
        left:0;
        right:0;
        margin:auto;
        width:80%;
        max-width:800px;

        font-family: 'Lato', sans-serif;
        font-size:0.6em;

    }






</style>
