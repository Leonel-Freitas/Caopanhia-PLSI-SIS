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
            $consultas = Marcacoesveterinarias::find()->where(['idClient' => Userprofile::find()->select(['id'])->where(['idUser' => $id])])->andWhere(['>=', 'hora', date("H:i:s")])->orderBy(['data' => SORT_ASC, 'hora' => SORT_ASC])->all();


        }else{
            $consultas = Marcacoesveterinarias::find()->where(['idVet' => Userprofile::find()->select(['id'])->where(['idUser' => $id])->scalar()])->andWhere(['>=', 'hora', date("H:i:s")])->orderBy(['data' => SORT_ASC, 'hora' => SORT_ASC])->all();
        }

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

            $hora_consulta = strtotime($consulta->hora);
            $hora_atual = strtotime(date("H:i:s"));
            $diferenca_horas = $hora_consulta - $hora_atual;
            if ($consulta->data == date("Y-m-d") && $diferenca_horas <= 86400) {
                try {
                    $message = "Ira ter uma consulta as ".$consulta->hora;
                    $mmqt = new \PhpMqtt\Client\MqttClient('broker.mqttdashboard.com', 1883, 'backend');
                    $mmqt->connect();
                    $mmqt->publish('testeAndroid', json_encode($message), 1);
                    $mmqt->disconnect();
                    echo 'Mensagem publicada com sucesso!';

                } catch (\Exception $e) {
                    echo 'Erro ao publicar mensagem: ' . $e->getMessage();
                }
            }

        }

        return $result;





    }


}