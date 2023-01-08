<?php

namespace frontend\controllers;

use common\models\Marcacoesveterinarias;
use common\models\Userprofile;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MarcacoesveterinariasController implements the CRUD actions for Marcacoesveterinarias model.
 */
class MarcacoesveterinariasController extends Controller
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

    /**
     * Lists all Marcacoesveterinarias models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->can('viewAppointment')) {

            $marcacoes = Marcacoesveterinarias::find()->where(['idClient' => Userprofile::find()->where(['idUser' => Yii::$app->user->getId()])->one()->id])->andWhere(['>=' ,'data', date('Y-m-d')])->orderBy(['data' => SORT_ASC, 'hora' => SORT_ASC]) ->all();

            return $this->render('index', [
                'marcacoes' => $marcacoes,
            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    public function actionIndexhistorico()
    {
        if (Yii::$app->user->can('viewAppointment')) {

            $marcacoes = Marcacoesveterinarias::find()->where(['idClient' => Userprofile::find()->where(['idUser' => Yii::$app->user->getId()])->one()->id])->andWhere(['<' ,'data', date('Y-m-d')])->orderBy(['data' => SORT_DESC, 'hora' => SORT_DESC]) ->all();

            return $this->render('indexhistorico', [
                'marcacoes' => $marcacoes,
            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /*
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /*
    public function actionCreate()
    {
        $model = new Marcacoesveterinarias();

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

    /*
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }*/

    /*
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the Marcacoesveterinarias model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Marcacoesveterinarias the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Marcacoesveterinarias::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
