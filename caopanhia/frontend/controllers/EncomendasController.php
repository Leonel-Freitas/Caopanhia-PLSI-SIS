<?php

namespace frontend\controllers;

use common\models\Carrinho;
use common\models\Encomendas;
use common\models\Produtos;
use common\models\Tiposexpedicao;
use common\models\Userprofile;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EncomendasController implements the CRUD actions for Encomendas model.
 */
class EncomendasController extends Controller
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
                            'roles' => ['client', 'admin'],
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
        if (Yii::$app->user->can('viewPackages')){
            $encomendas = Encomendas::find()->where(['idUser' => Userprofile::find()->where(['idUser' => Yii::$app->user->getId()])->one()->id, 'finalizada' => 'sim'])->orderBy(['data' => SORT_DESC])->all();

            return $this->render('index', [
                'encomendas' => $encomendas,
            ]);
        } else {
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
    }
}

    public function actionView($id)
    {
        if (Yii::$app->user->can('readPackage')){
            $encomenda = Encomendas::findOne($id);
            $carrinho = Carrinho::find()->where(['idEncomenda' => $id])->all();
            $produtosCarrinho = [];

            foreach ($carrinho as $produto){

                array_push($produtosCarrinho, Produtos::find()->where(['id' => $produto->idProduto])->one());
            }


            return $this->render('view', [
                'carrinho' => $carrinho,
                'produtosCarrinho' => $produtosCarrinho,
                'encomenda' => $encomenda,
            ]);
    } else {
        throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }

    }

    /**
     * Creates a new Encomendas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if(Yii::$app->user->can('createPackage')){
            //Get encomenda e produtos do carrinho
            $encomenda = Encomendas::find()->where(['idUser' => Userprofile::find()->where(['idUser' => Yii::$app->user->getId()])->one()->id, 'finalizada' => 'nao'])->one();
            $produtosCarrinho = Carrinho::find()->where(['idEncomenda' => $encomenda->id])->all();
            foreach ($produtosCarrinho as $produto){
                $produtoReal = Produtos::findOne($produto->idProduto);
                $produtoReal->stock = $produtoReal->stock - $produto->quantidade;
                if ($produtoReal->stock < 0){
                    Yii::$app->session->setFlash('error', 'O produto '.$produtoReal->designacao.' não possui stock suficiente, o stock atual é de '. $produtoReal->stock + $produto->quantidade.' unidades.');
                    return $this->redirect(['carrinho/view']);
                }
            }

            if ($this->request->isPost) {

                $valorTotal = 0;

                foreach ($produtosCarrinho as $produto){
                    $produtoReal = Produtos::findOne($produto->idProduto);
                    $produtoReal->stock = $produtoReal->stock - $produto->quantidade;
                    $produtoReal->save();

                    $produto->valorPago = $produtoReal->valor;
                    $produto->save();

                    $valorTotal = $valorTotal + ($produto->valorPago * $produto->quantidade);
                }

                //Update encomenda
                $encomenda->data = Yii::$app->formatter->asDatetime('now', 'yyyy-MM-dd HH:mm:ss');
                $encomenda->finalizada = 'sim';

                if ($encomenda->load($this->request->post())) {

                    $listaMetodosExpedicaoAtivos = Tiposexpedicao::find()->where(['status' => 10])->all();
                    $metodoEscolhido = $listaMetodosExpedicaoAtivos[$encomenda->idExpedicao];

                    $encomenda->idExpedicao = $metodoEscolhido->id;
                    $encomenda->valorTotal = $valorTotal + $metodoEscolhido->custo;
                    $encomenda->save();


                    Yii::$app->session->setFlash('success', 'A sua encomenda foi concluida com sucesso, obrigado!');
                    return $this->redirect(['produtos/index', 'filtro' => 0]);
                }
            }

            $listaMetodosExpedicao = Tiposexpedicao::find()->where(['status' => 10])->all();
            $metodos = [];
            foreach ($listaMetodosExpedicao as $metodoExpedicao) {
                array_push($metodos, $metodoExpedicao->designacao.' (custo adicional de '.$metodoExpedicao->custo.'€)');
            }


            return $this->render('create', [
                'encomenda' => $encomenda,
                'metodosExpedicao' => $metodos
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
     * Finds the Encomendas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Encomendas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Encomendas::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
