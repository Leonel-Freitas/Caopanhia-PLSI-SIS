<?php

namespace backend\modules\api\controllers;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\ActiveController;



class UserController extends ActiveController
{
    public $modelClass = 'common\models\User';

    public function actionCount()
    {
        $pratosmodel = new $this->modelClass;
        $recs = $pratosmodel::find()->all();
        return ['count' => count($recs)];
    }



}
