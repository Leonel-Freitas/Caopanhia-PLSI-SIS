<?php

namespace backend\modules\api\controllers;

use common\models\Encomendas;
use Yii;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class EncomendasController extends ActiveController
{
    public $modelClass = 'common\models\Encomendas';
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),  // ou QueryParamAuth::className(),
            //’except' => ['index', 'view'], //Excluir aos GETs

        ];
        return $behaviors;
    }

    public function actionHistorico(){
        $user = Yii::$app->user->identity;
        $id = $user->getId();
        $encomendas = Encomendas::find()->where(['idUser' => $id])->andWhere(['finalizada' => 'sim'])->all();
        $result = [];

        foreach ($encomendas as $encomenda){
            $result[] = [
                'id' => $encomenda->id,
                'valorTotal' => $encomenda->valorTotal,
                'data' => $encomenda->data,
                'estado' => $encomenda->estado,
            ];
        }
        return $result;


    }

}