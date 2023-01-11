<?php

namespace backend\modules\api\controllers;

use common\models\Caes;
use common\models\Marcacoesveterinarias;
use common\models\Userprofile;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;

class MarcacoesveterinariasController extends ActiveController
{
    public $modelClass = 'common\models\Marcacoesveterinarias';


    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),  // ou QueryParamAuth::className(),
            //’except' => ['index', 'view'], //Excluir aos GETs

        ];
        return $behaviors;
    }

    public function actionConsultas()
    {
        $request = \Yii::$app->request;
        $data = $request->post();
        $consultas = Marcacoesveterinarias::find()->where(['idVet' => $data['idVet']])->andWhere(['>=', 'data', date('Y-m-d')])->orderBy(['data' => SORT_ASC, 'hora' => SORT_ASC])->all();

        $result = [];

        foreach ($consultas as $consulta) {
            $nomeCao = Caes::findOne($consulta->idCao)->nome;
            $nomeClient = Userprofile::findOne($consulta->idClient)->nome;
            $result[] = [
                'ID' => $consulta->data,
                'Nome' => $consulta->hora,
                'NomeClient' => $nomeClient,
                'NomeCao' => $nomeCao,
            ];
        }
        return $result;

    }
}