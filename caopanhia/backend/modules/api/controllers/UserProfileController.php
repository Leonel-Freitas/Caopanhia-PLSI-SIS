<?php


namespace backend\modules\api\controllers;

use yii\rest\ActiveController;


class UserProfileController extends ActiveController
{
    public $modelClass = 'common\models\UserProfile';
}