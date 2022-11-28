<?php

namespace backend\controllers;

use common\models\Distritos;
use common\models\DistritosSearch;
use common\models\Userprofile;
use PHPUnit\Framework\Error;
use PHPUnit\Framework\Warning;
use Yii;
use yii\console\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DistritosController implements the CRUD actions for Distritos model.
 */
class DistritosController extends Controller
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
                            'roles' => ['admin'],
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

    /**
     * Lists all Distritos models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('viewDistrict')) {
            $listaDistritos = Distritos::find()->all();

            return $this->render('index', [
                'distritos' => $listaDistritos
            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }

    }

    public function actionDisable($id)
    {
        if (Yii::$app->user->can('desactivateDistrict')) {
            $users = Userprofile::find()->all();
            foreach ($users as $user) {
                if ($user->idDistrito == $id) {
                    Yii::$app->session->setFlash('error', 'Não pode desativar este distrito porque existem utilizadores associados a este distrito');
                    return $this->redirect(['index']);
                }
            }

            $model = $this->findModel($id);
            $model->status = 9;
            $model->save();
            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    public function actionReactivate($id)
    {
        if (Yii::$app->user->can('reactivateDistrict')) {
            $model = $this->findModel($id);
            $model->status = 10;
            $model->save();
            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }


    /*public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new Distritos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('createDistrict')) {
            $model = new Distritos();

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['index']);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /**
     * Updates an existing Distritos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('updateDistrict')) {
            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /*public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the Distritos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Distritos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Distritos::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
