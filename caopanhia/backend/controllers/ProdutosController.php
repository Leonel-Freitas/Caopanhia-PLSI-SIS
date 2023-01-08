<?php

namespace backend\controllers;

use common\models\Categorias;
use common\models\Produtos;
use common\models\SearchProdutos;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProdutosController implements the CRUD actions for Produtos model.
 */
class ProdutosController extends Controller
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
                            'roles' => ['admin', 'gestor'],
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
     * Lists all Produtos models.
     *
     * @return string
     */
    public function actionIndex($filtro)
    {
        if (Yii::$app->user->can('viewProducts')) {

            if ($filtro == 0)
                $produtos = Produtos::find()->all();
            else
                $produtos = Produtos::find()->where(['idCategoria' => $filtro])->all();


            return $this->render('index', [
                'produtos' => $produtos,

            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    public function actionFiltrar()
    {
        if (Yii::$app->user->can('viewProducts')) {

            $categorias = Categorias::find()->where(['status' => 10])->all();

            return $this->render('filtrar', [
                'categorias' => $categorias
            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /**
     * Displays a single Produtos model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (Yii::$app->user->can('readProduct')) {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /**
     * Creates a new Produtos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (Yii::$app->user->can('createProduct')) {
            $model = new Produtos();

            if (UploadedFile::getInstance($model, 'imageFile') != null) {
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                $model->upload();
                $model->imagem = $model->imageFile->name;
            }
            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['index', 'filtro' => $model->idCategoria]);
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
     * Updates an existing Produtos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->can('updateProduct')) {
            $model = $this->findModel($id);

            if (UploadedFile::getInstance($model, 'imageFile') != null) {
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                $model->upload();
                $model->imagem = $model->imageFile->name;
            }
            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    public function actionStock($id)
    {
        if (Yii::$app->user->can('updateProduct')) {
            $model = $this->findModel($id);

            if ($this->request->isPost && $model->load($this->request->post())) {
                $model->stock = $model->toAddStock + $model->stock;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }

            return $this->render('addstock', [
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

    /**
     * Finds the Produtos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Produtos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produtos::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
