<?php

namespace frontend\controllers;

use common\models\Caes;
use common\models\CaesSearch;
use common\models\UploadImage;
use common\models\Userprofile;
use Yii;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CaesController implements the CRUD actions for Caes model.
 */
class CaesController extends Controller
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
        $searchModel = new CaesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }*/

    /*
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new Caes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('createDog')) {
            $model = new Caes();

            if ($this->request->isPost) {
                if (UploadedFile::getInstance($model, 'imageFile') != null) {
                    $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                    $model->upload();
                    $model->imagem = $model->imageFile->name;
                }
                $model->idUserProfile = Userprofile::find()->where(['idUser' => \Yii::$app->user->getId()])->one()->id;
                $model->load($this->request->post());
                if ($model->save()) {
                    return $this->redirect(['anuncios/create', 'idcao' => $model->id]);
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
     * Updates an existing Caes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $idAnuncio)
    {
        if (Yii::$app->user->can('updateDog')) {
            $model = $this->findModel($id);

            if ($this->request->isPost) {
                if (UploadedFile::getInstance($model, 'imageFile') != null){
                    $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                    $model->upload();
                    $model->imagem = $model->imageFile->name;
                }
                $model->load($this->request->post());
                if ($model->save()) {
                    return $this->redirect(['anuncios/update', 'id' => $idAnuncio]);
                }
            }

            return $this->render('update', [
                'model' => $model,
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

    public function actionSolicitarmarcacao($id, $idAnuncio)
    {
        if (Yii::$app->user->can('updateDog')) {
            $cao = Caes::findOne($id);
            $cao->pedidoConsulta = 1;
            $cao->save();

            Yii::$app->session->setFlash('success', 'Foi solicitada uma marcação de consulta veterinária, os nossos veterinários iram responder o mais brevemente possivel!');
            return $this->redirect(['anuncios/view', 'id' => $idAnuncio]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /**
     * Finds the Caes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Caes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Caes::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
