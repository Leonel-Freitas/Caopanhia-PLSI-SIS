<?php

namespace backend\controllers;

use common\models\Carrinho;
use common\models\Encomendas;
use common\models\EncomendasSearch;
use common\models\Produtos;
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
     * Lists all Encomendas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if(\Yii::$app->user->can('viewPackages')){

            //filtrar encomendas  por pendentes, enviadas e entregues
            $encomendasPendentes = Encomendas::find()->where(['finalizada' => 'sim', 'estado' => 'pendente'])->orderBy(['data' => SORT_ASC])->all();
            $encomendasEnviadas = Encomendas::find()->where(['estado' => 'enviada'])->orderBy(['data' => SORT_ASC])->all();
            $encomendasEntregues = Encomendas::find()->where(['estado' => 'entregue'])->orderBy(['data' => SORT_DESC])->all();

            //TODO order by

            return $this->render('index', [
                'encomendasPendentes' => $encomendasPendentes,
                'encomendasEnviadas' => $encomendasEnviadas,
                'encomendasEntregues' => $encomendasEntregues,
            ]);
         }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }


    public function actionView($id)
    {
        if(\Yii::$app->user->can('readPackage')){
            $model = $this->findModel($id);
            $carrinho = Carrinho::find()->where(['idEncomenda' => $id])->all();
            $produtosCarrinho = [];

            foreach ($carrinho as $produto){

                array_push($produtosCarrinho, Produtos::find()->where(['id' => $produto->idProduto])->one());
            }


            return $this->render('view', [
                'carrinho' => $carrinho,
                'produtosCarrinho' => $produtosCarrinho,
                'model' => $model,
            ]);

        }else{
            throw new ForbiddenHttpException('Você não tem permissão para realizar esta ação!');
        }
    }

    /*
    public function actionCreate()
    {
        $model = new Encomendas();

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

    public function actionUpdate($id, $estado)
    {
        if(\Yii::$app->user->can('updatePackage')){
            $model = $this->findModel($id);

            switch ($estado){
                case 'pendente':
                    $model->estado = 'enviada';
                    break;
                case 'enviada':
                    $model->estado = 'entregue';
                    break;
            }

            $model->save();

            return $this->redirect(['index']);
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
