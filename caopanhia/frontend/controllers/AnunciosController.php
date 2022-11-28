<?php

namespace frontend\controllers;

use common\models\Anuncios;
use common\models\AnunciosSearch;
use common\models\Caes;
use common\models\Comentarios;
use common\models\Userprofile;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AnunciosController implements the CRUD actions for Anuncios model.
 */
class AnunciosController extends Controller
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
     * Lists all Anuncios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $user = Userprofile::find()->where(['idUser' => Yii::$app->user->getId()])->one();
        $anuncios = Anuncios::find()->where(['dataAdocao' => null])->andWhere(['not', ['idUser' => $user->id]])->all();

        $searchModel = new AnunciosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'anuncios' => $anuncios
        ]);
    }

    public function actionIndexpessoal()
    {
        $user = Userprofile::find()->where(['idUser' => Yii::$app->user->getId()])->one();
        $anuncios = Anuncios::find()->where(['dataAdocao' => null])->andWhere(['idUser' => $user->id])->all();


        return $this->render('indexpessoal', [
            'anuncios' => $anuncios
        ]);
    }

    /**
     * Displays a single Anuncios model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $anuncio = Anuncios::findOne($id);
        $cao = Caes::findOne($anuncio->idCao);

        return $this->render('view', [
            'anuncio' => $anuncio,
            'cao' => $cao,
        ]);
    }

    /**
     * Creates a new Anuncios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($idcao)
    {
        $model = new Anuncios();
        $model->idCao = $idcao;
        $model->idUser = Userprofile::find()->where(['idUser' => \Yii::$app->user->getId()])->one()->id;
        $model->dataCriacao = Yii::$app->formatter->asDatetime('now', 'yyyy-MM-dd HH:mm:ss');


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
    }

    /**
     * Updates an existing Anuncios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $nomeCao = Caes::findOne($model->idCao)->nome;

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'nomeCao' => $nomeCao
        ]);
    }

    /**
     * Deletes an existing Anuncios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $idCao)
    {
        $comentarios = Comentarios::find()->where(['idAnuncio' => $id])->all();
        if ($comentarios != null){
            foreach ($comentarios as $comentario)
                $comentario->delete();
        }
        Anuncios::findOne($id)->delete();
        Caes::findOne($idCao)->delete();

        Yii::$app->session->setFlash('success', 'O seu anuncio foi removido com sucesso! O cão associado ao anúncio também foi removido do sistema.');
        return $this->redirect(['indexpessoal']);
    }

    public function actionAdotar($id, $idUser)
    {
        $anuncio = Anuncios::findOne($id);
        $anuncio -> dataAdocao = Yii::$app->formatter->asDatetime('now', 'yyyy-MM-dd HH:mm:ss');
        $anuncio->idUser = $idUser;
        $anuncio->save();

        $cao = Caes::findOne($anuncio->idCao);
        $cao->adotado = 'sim';
        $cao->idUserProfile = $idUser;
        $cao->save();

        return $this->redirect(['indexpessoal']);
    }

    /**
     * Finds the Anuncios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Anuncios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Anuncios::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
