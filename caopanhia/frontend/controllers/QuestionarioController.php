<?php

namespace frontend\controllers;

use common\models\Questionario;
use common\models\Racas;
use common\models\Respostasquestionario;
use common\models\Userprofile;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * QuestionarioController implements the CRUD actions for Questionario model.
 */
class QuestionarioController extends Controller
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


    public function actionCreate()
    {

            $contador = 0;
            $proximaPergunta = null;
            $perguntas = Questionario::find()->all();
            foreach ($perguntas as $pergunta){
                $contador ++;
                if (Respostasquestionario::find()->where(['idUser' => Userprofile::find()->where(['idUser' => \Yii::$app->user->getId()])->one()->id])->andWhere(['idPergunta' => $pergunta->id])->one() == null){
                    $proximaPergunta = $pergunta;
                    break;
                }
            }

            if ($proximaPergunta == null)
                return $this->redirect(['calcularresultados']);


            $model = new Respostasquestionario();
            $model->idPergunta = $proximaPergunta->id;
            $model->idUser = Userprofile::find()->where(['idUser' => \Yii::$app->user->getId()])->one()->id;

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['create']);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
                'contador' => $contador,
                'pergunta' => $proximaPergunta,
            ]);
    }


    public function actionCalcularresultados()
    {
        $respostas = Respostasquestionario::find()->where(['idUser' => Userprofile::find()->where(['idUser' => \Yii::$app->user->getId()])->one()->id])->all();

        $totalPontos = 0;
        foreach ($respostas as $resposta){
            if ($resposta->resposta == 'sim')
                $totalPontos = $totalPontos + Questionario::findOne($resposta->idPergunta)->pontosSim;
            else
                $totalPontos = $totalPontos + Questionario::findOne($resposta->idPergunta)->pontosNao;
        }

        if ($totalPontos > 90)
            $totalPontos = 90;

        $racaIdeal = Racas::find()->where(['pontos' => $totalPontos])->all();
        shuffle($racaIdeal);

        foreach ($respostas as $resposta){
            $resposta->delete();
        }

        return $this->render('resultado', [
            'raca' => $racaIdeal
        ]);
    }

    /**
     * Finds the Questionario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Questionario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Questionario::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
