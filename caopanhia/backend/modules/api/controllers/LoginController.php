<?php

namespace backend\modules\api\controllers;
use common\models\User;
use HttpException;
use Yii;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use function PHPUnit\Framework\throwException;


class LoginController extends ActiveController
{
    public $modelClass = "Sem acesso";
    public function actionPost()
    {

        $request = \Yii::$app->request;
        $data = $request->post();
        $user = User::find()->where(['email' => $data['email']])->one();
        if (!$user || !$user->validatePassword($data['password'])) {
            throw new HttpException(401, 'Email ou senha inválidos');
        }

        return [
            'token' => $user->auth_key,
        ];
    }





}
