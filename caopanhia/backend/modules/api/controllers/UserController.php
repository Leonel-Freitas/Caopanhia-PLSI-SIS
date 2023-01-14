<?php

namespace backend\modules\api\controllers;
use common\models\User;
use HttpException;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;



class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';



    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),  // ou QueryParamAuth::className(),
            //’except' => ['index', 'view'], //Excluir aos GETs

        ];
        return $behaviors;
    }



    public function actionContagem()
    {

        $user = Yii::$app->user->identity;
        $id = $user->getId();

        return $id;
    }







}
