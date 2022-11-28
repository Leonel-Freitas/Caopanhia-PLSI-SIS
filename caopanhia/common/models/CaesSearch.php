<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Caes;

/**
 * CaesSearch represents the model behind the search form of `common\models\Caes`.
 */
class CaesSearch extends Caes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'pedidoConsulta', 'idUserProfile', 'idRaca'], 'integer'],
            [['imagem', 'nome', 'anoNascimento', 'genero', 'microship', 'castrado', 'adotado'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Caes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'anoNascimento' => $this->anoNascimento,
            'pedidoConsulta' => $this->pedidoConsulta,
            'idUserProfile' => $this->idUserProfile,
            'idRaca' => $this->idRaca,
        ]);

        $query->andFilterWhere(['like', 'imagem', $this->imagem])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'genero', $this->genero])
            ->andFilterWhere(['like', 'microship', $this->microship])
            ->andFilterWhere(['like', 'castrado', $this->castrado])
            ->andFilterWhere(['like', 'adotado', $this->adotado]);

        return $dataProvider;
    }
}
