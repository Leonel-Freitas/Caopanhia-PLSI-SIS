<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Encomendas;

/**
 * EncomendasSearch represents the model behind the search form of `common\models\Encomendas`.
 */
class EncomendasSearch extends Encomendas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idExpedicao', 'idPagamento', 'idUser'], 'integer'],
            [['valorTotal'], 'number'],
            [['data', 'finalizada', 'estado'], 'safe'],
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
        $query = Encomendas::find();

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
            'valorTotal' => $this->valorTotal,
            'data' => $this->data,
            'idExpedicao' => $this->idExpedicao,
            'idPagamento' => $this->idPagamento,
            'idUser' => $this->idUser,
        ]);

        $query->andFilterWhere(['like', 'finalizada', $this->finalizada])
            ->andFilterWhere(['like', 'estado', $this->estado]);

        return $dataProvider;
    }
}
