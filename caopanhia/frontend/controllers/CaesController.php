<?php

namespace frontend\controllers;

use common\models\Caes;
use common\models\CaesSearch;
use common\models\UploadImage;
use common\models\Userprofile;
use Yii;
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
     * Lists all Caes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CaesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Caes model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Caes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
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
    }

    /**
     * Deletes an existing Caes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionSolicitarmarcacao($id, $idAnuncio)
    {
        $cao = Caes::findOne($id);
        $cao->pedidoConsulta = 1;
        $cao->save();

        Yii::$app->session->setFlash('success', 'Foi solicitada uma marcação de consulta veterinária, os nossos veterinários iram responder o mais brevemente possivel!');
        return $this->redirect(['anuncios/view', 'id' => $idAnuncio]);
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
