<?php


namespace backend\modules\api\controllers;
use common\models\Caes;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use yii\web\Controller;


class CaesController extends ActiveController
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

    public function actionCaespessoais(){
        $request = \Yii::$app->request;
        $data = $request->post();
        $users = Caes::find()->where(['idUserProfile' => $data['idUserProfile']])->andWhere(['adotado' => 'sim'])->all();

        $result = [];

        foreach ($users as $user){
            $result[] = [
                'ID' => $user->id,
                'Nome' => $user->nome,
                'AnoNascimento' => $user->anoNascimento,
                'Genero' => $user->genero,
                'Microship' => $user->microship,
                'Castrado' => $user->castrado,
            ];
        }
        return $result;


    }
    }
