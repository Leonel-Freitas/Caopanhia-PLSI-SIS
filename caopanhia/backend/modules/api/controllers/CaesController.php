<?php


namespace backend\modules\api\controllers;
use common\models\Caes;
use common\models\User;
use common\models\Userprofile;
use Yii;
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

        $user = Yii::$app->user->identity;
        $id = $user->getId();
        $caesPessoais = new $this->modelClass;
        $caes = $caesPessoais::find()->where(['idUserProfile' => Userprofile::find()->select(['id'])->where(['idUser' => $id])->scalar()])->andWhere(['adotado' => 'sim'])->all();

        $result = [];

        foreach ($caes as $cao){
            $result[] = [
                'id' => $cao->id,
                'imagem' => $cao->imagem,
                'nome' => $cao->nome,
                'anoNascimento' => $cao->anoNascimento,
                'genero' => $cao->genero,
                'microship' => $cao->microship,
                'castrado' => $cao->castrado,
                'pedidoConsulta' => $cao->pedidoConsulta,
                'adotado' => $cao->adotado,
                'idUserProfile' => $cao->idUserProfile,
                'idRaca' => $cao->idRaca,
            ];
        }
        return $result;


    }


}
