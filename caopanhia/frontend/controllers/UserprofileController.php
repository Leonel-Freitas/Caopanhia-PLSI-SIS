<?php

namespace frontend\controllers;

use common\models\Userprofile;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\rbac\Role;
use yiiunit\extensions\bootstrap5\data\User;

/**
 * UserprofileController implements the CRUD actions for Userprofile model.
 */
class UserprofileController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['admin', 'client'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /*
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Userprofile::find(),
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],

        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }*/

    /**
     * Displays a single Userprofile model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('readUserProfile')) {
            $thisUser = Userprofile::findOne($id);
            $role = \common\models\User::findOne($thisUser->idUser)->getRoleName();
            return $this->render('view', [
                'thisUser' => $thisUser,
                'role' => $role,

            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /*
    public function actionCreate()
    {
        $model = new Userprofile();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }*/

    public function actionViewprofile($id)
    {
        if (Yii::$app->user->can('readUserProfile')) {
            $thisUser = Userprofile::findOne($id);
            $thisEmailUser = \common\models\User::findOne($thisUser->idUser)->email;
            $thisRoleUser = \common\models\User::findOne($thisUser->idUser)->getRoleName();
            return $this->render('viewprofile', [
                'thisUser' => $thisUser,
                'thisEmailUser' => $thisEmailUser,
                'role' => $thisRoleUser,
            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /**
     * Updates an existing Userprofile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('updateUserProfile')) {
            $thisUser = Userprofile::find()->where(['idUser' => $id])->one();

            if ($this->request->isPost) {
                if (UploadedFile::getInstance($thisUser, 'imageFile') != null) {
                    $thisUser->imageFile = UploadedFile::getInstance($thisUser, 'imageFile');
                    $thisUser->upload();
                    $thisUser->imagem = $thisUser->imageFile->name;
                }
            }
            if ($this->request->isPost && $thisUser->load($this->request->post()) && $thisUser->save()) {
                return $this->redirect(['view', 'id' => $thisUser->id]);
            }



            return $this->render('update', [
                'thisUser' => $thisUser,
            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /*
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the Userprofile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Userprofile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Userprofile::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
