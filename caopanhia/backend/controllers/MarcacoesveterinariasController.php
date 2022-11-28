<?php

namespace backend\controllers;

use common\models\Anuncios;
use common\models\Caes;
use common\models\Consultas;
use common\models\Marcacoesveterinarias;
use common\models\MarcacoesveterinariasSearch;
use common\models\Racas;
use Yii;
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
                            'roles' => ['admin', 'vet'],
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
        $searchModel = new MarcacoesveterinariasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexpedidos()
    {
        if (Yii::$app->user->can('viewAppointment')) {
            $caes = Caes::find()->where(['pedidoConsulta' => 1])->all();

            return $this->render('indexpedidos', [
                'caes' => $caes,
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

    /**
     * Creates a new Marcacoesveterinarias model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($idCao)
    {
        if (Yii::$app->user->can('createAppointment')) {
            $cao = Caes::findOne($idCao);
            $model = new Marcacoesveterinarias();
            $model->idCao = $cao->id;
            $model->idClient = $cao->idUserProfile;
            $model->idVet = \Yii::$app->user->getId();

            if ($this->request->isPost) {
                if ($model->load($this->request->post())) {
                    $consulta = new Consultas();
                    $consulta->diagonostico = 'a defenir';
                    $consulta->tratamento = 'a defenir';
                    $consulta->notas = 'nada a apontar';
                    $consulta->save();
                    $model->idConsulta = $consulta->id;
                    $model->save();
                    $cao->pedidoConsulta = 0;
                    $cao->save();
                    Yii::$app->session->setFlash('success', 'Consulta marcada com sucesso!');
                    return $this->redirect(['indexpedidos']);
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
