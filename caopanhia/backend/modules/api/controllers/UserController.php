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

    public $user=null;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::className(),  // ou QueryParamAuth::className(),
            //’except' => ['index', 'view'], //Excluir aos GETs
            'auth' => [$this, 'auth']
        ];
        return $behaviors;
    }
    public function auth($username, $password)
    {
        $user = \common\models\User::findByUsername($username);
        if ($user && $user->validatePassword($password))
        {
            $this->user=$user;
            $this->actionLogin($user);
            return $user;

        }
        throw new \yii\web\ForbiddenHttpException('No authentication'); //403
    }


    public function actionContagem()
    {
        $pratosmodel = new $this->modelClass;
        $recs = $pratosmodel::find()->all();
        return ['count' => count($recs)];
    }







}
