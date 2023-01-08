<?php

namespace frontend\controllers;

use common\models\Categorias;
use common\models\Encomendas;
use common\models\Produtos;
use common\models\Userprofile;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
     * Lists all Produtos models.
     *
     * @return string
     */
    public function actionIndex($filtro)
    {

        if (Yii::$app->user->can('viewProducts')) {
            if (Encomendas::find()->where(['idUser' => Userprofile::find()->where(['idUser' => Yii::$app->user->getId()])->one()->id])->andWhere(['finalizada' => 'nao'])->one() == null){
                $encomenda = new Encomendas();
                $encomenda->finalizada = 'nao';
                $encomenda->idUser = Userprofile::find()->where(['idUser' => Yii::$app->user->getId()])->one()->id;
                $encomenda->save();
            }

            if ($filtro == 0)
                $produtos = Produtos::find()->where(['>','stock', 0])->all();
            else
                $produtos = Produtos::find()->where(['>','stock', 0])->andWhere(['idCategoria' => $filtro])->all();

            /*$dataProvider = new ActiveDataProvider([
                'query' => Produtos::find(),

            ]);*/

            return $this->render('index', [
                //'dataProvider' => $dataProvider,
                'produtos' => $produtos,

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

    /*
    public function actionCreate()
    {
        $model = new Produtos();

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

    function actionAddToBasket()

    {

    }


}
