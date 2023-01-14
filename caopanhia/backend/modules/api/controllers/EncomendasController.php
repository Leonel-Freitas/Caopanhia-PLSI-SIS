<?php

namespace backend\modules\api\controllers;

use common\models\Encomendas;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class EncomendasController extends ActiveController
{
    public $modelClass = 'common\models\Caes';
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),  // ou QueryParamAuth::className(),
            //’except' => ['index', 'view'], //Excluir aos GETs

        ];
        return $behaviors;
    }

    public function actionDados(){
        $user = Yii::$app->user->identity;
        $id = $user->getId();
        $encomendas = Encomendas::find()->where(['idUser' => $id['idUser']])->andWhere(['finalizada' => 'sim'])->all();

        $result = [];

        foreach ($encomendas as $encomenda){
            $result[] = [
                'ID' => $encomenda->id,
                'ValorTotal' => $encomenda->valorTotal,
                'Data' => $encomenda->data,
                'Estado' => $encomenda->estado,
            ];
        }
        return $result;


    }

}