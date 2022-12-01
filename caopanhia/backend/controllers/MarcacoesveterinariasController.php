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


    public function actionIndex()
    {
        if (Yii::$app->user->can('viewAppointment')) {

            $marcacoes = Marcacoesveterinarias::find()->where(['idVet' => \Yii::$app->user->getId()])->andWhere(['>=' ,'data', date('Y-m-d')])->orderBy(['data' => SORT_ASC, 'hora' => SORT_ASC]) ->all();

            return $this->render('index', [
                'marcacoes' => $marcacoes,
            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
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

    public function actionIndexhistorico()
    {
        if (Yii::$app->user->can('viewAppointment')) {

            $marcacoes = Marcacoesveterinarias::find()->where(['idVet' => \Yii::$app->user->getId()])->andWhere(['<' ,'data', date('Y-m-d')])->orderBy(['data' => SORT_DESC, 'hora' => SORT_DESC]) ->all();

            $marcacaoComConsulta = [];
            $marcacaoSemConsulta = [];

            foreach ($marcacoes as $marcacao) {
                if (Consultas::findOne($marcacao->idConsulta)->diagonostico == 'a definir') {
                    array_push($marcacaoSemConsulta, $marcacao);
                } else {
                    array_push($marcacaoComConsulta, $marcacao);
                }
            }

            return $this->render('indexhistorico', [
                'marcacaoComConsulta' => $marcacaoComConsulta,
                'marcacaoSemConsulta' => $marcacaoSemConsulta,
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
                    $consulta->diagonostico = 'a definir';
                    $consulta->tratamento = 'a definir';
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


    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('updateAppointment')) {
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


    public function actionDelete($id)
    {
        if (Yii::$app->user->can('deleteAppointment')) {
            $marcacao = $this->findModel($id);
            $consulta = Consultas::findOne($marcacao->idConsulta);
            $cao = Caes::findOne($marcacao->idCao);

            $cao->pedidoConsulta = 1;
            $cao->save();
            $marcacao->delete();
            $consulta->delete();

            return $this->redirect(['index']);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

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
