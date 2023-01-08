<?php

namespace frontend\controllers;

use common\models\Carrinho;
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
 * CarrinhoController implements the CRUD actions for Carrinho model.
 */
class CarrinhoController extends Controller
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
            'query' => Carrinho::find(),

        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }*/

    /**
     * Displays a single Carrinho model.
     * @param int $idEncomenda Id Encomenda
     * @param int $idProduto Id Produto
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        if (Yii::$app->user->can('readShopCar')) {
            $encomenda = Encomendas::find()->where(['idUser' => Userprofile::find()->where(['idUser' => Yii::$app->user->getId()])->one()->id , 'finalizada' => 'nao'])->one();
            $produtosCarrinho = Carrinho::find()->where(['idEncomenda' => $encomenda->id])->all();


            return $this->render('view', [
                'produtosCarrinho' => $produtosCarrinho
            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /**
     * Creates a new Carrinho model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($idProduto)
    {
        if (Yii::$app->user->can('readShopCar')) {

            $encomenda = Encomendas::find()->where(['idUser' => Userprofile::find()->where(['idUser' => Yii::$app->user->getId()])->one()->id, 'finalizada' => 'nao'])->one();
            $isProdutoOnCarrinho = Carrinho::find()->where(['idEncomenda' => $encomenda->id, 'idProduto' => $idProduto])->one();

            if ($isProdutoOnCarrinho == null){
                $produtoCarrinho = new Carrinho();
                $produtoCarrinho->idEncomenda = $encomenda->id;
                $produtoCarrinho->idProduto = $idProduto;
                $produtoCarrinho->quantidade = 1;
                $produtoCarrinho->save();
            }else{
                $isProdutoOnCarrinho->quantidade ++;
                $isProdutoOnCarrinho->save();
            }


            Yii::$app->session->setFlash('success', 'Produto adicionado ao carrinho.');
            return $this->redirect(['produtos/index', 'filtro' => Produtos::findOne($idProduto)->idCategoria]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /**
     * Updates an existing Carrinho model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idEncomenda Id Encomenda
     * @param int $idProduto Id Produto
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idProduto)
    {
        if (Yii::$app->user->can('updateShopCar')) {
            $encomenda = Encomendas::find()->where(['idUser' => Userprofile::find()->where(['idUser' => Yii::$app->user->getId()])->one()->id, 'finalizada' => 'nao'])->one();
            $model = $this->findModel($encomenda->id, $idProduto);

            if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view']);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /**
     * Deletes an existing Carrinho model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idEncomenda Id Encomenda
     * @param int $idProduto Id Produto
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idProduto)
    {
        if (Yii::$app->user->can('deleteShopCar')) {
            $encomenda = Encomendas::find()->where(['idUser' => Userprofile::find()->where(['idUser' => Yii::$app->user->getId()])->one()->id, 'finalizada' => 'nao'])->one();
            $this->findModel($encomenda->id, $idProduto)->delete();

            return $this->redirect(['view']);
        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /**
     * Finds the Carrinho model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idEncomenda Id Encomenda
     * @param int $idProduto Id Produto
     * @return Carrinho the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idEncomenda, $idProduto)
    {
        if (($model = Carrinho::findOne(['idEncomenda' => $idEncomenda, 'idProduto' => $idProduto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
