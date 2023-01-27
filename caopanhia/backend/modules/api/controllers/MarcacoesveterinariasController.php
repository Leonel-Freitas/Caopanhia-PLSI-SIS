<?php

namespace backend\modules\api\controllers;

use common\models\Caes;
use common\models\Marcacoesveterinarias;
use common\models\User;
use common\models\Userprofile;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

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

    public function actionFuturasconsultas()
    {
        $user = Yii::$app->user->identity;
        $id = $user->getId();
        $user = User::findOne($id);

        if ($user->getRoleName() == 'client'){
            $consultas = Marcacoesveterinarias::find()->where(['idClient' => Userprofile::find()->select(['id'])->where(['idUser' => $id])->scalar()])->andWhere(['>=', 'data', date("Y-m-d")])->orderBy(['data' => SORT_ASC, 'hora' => SORT_ASC])->all();
        }else{
            $consultas = Marcacoesveterinarias::find()->where(['idVet' => Userprofile::find()->select(['id'])->where(['idUser' => $id])->scalar()])->andWhere(['>=', 'data', date("Y-m-d")])->orderBy(['data' => SORT_ASC, 'hora' => SORT_ASC])->all();
        }

        $result = [];

        foreach ($consultas as $consulta) {
            $nomeCao = Caes::findOne($consulta->idCao)->nome;
            $nomeClient = Userprofile::findOne($consulta->idClient)->nome;
            $nomeVet = Userprofile::findOne($consulta->idVet)->nome;
            $result[] = [
                'id' => $consulta->id,
                'data' => $consulta->data,
                'hora' => $consulta->hora,
                'nomeClient' => $nomeClient,
                'nomeVet' => $nomeVet,
                'nomeCao' => $nomeCao,

            ];
        }

        return $result;

    }
}