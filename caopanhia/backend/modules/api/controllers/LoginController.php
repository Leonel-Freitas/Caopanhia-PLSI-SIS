<?php

namespace backend\modules\api\controllers;
use common\models\User;
use common\models\Userprofile;
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

        $user_id = Userprofile::find()->where(['idUser' => $user->id])->one()->id;


        return [
            'token' => $user->auth_key,
            'role' => $user->getRoleName(),
            'username' => $user->username,
            'id_user' => $user_id,
        ];
    }





}
