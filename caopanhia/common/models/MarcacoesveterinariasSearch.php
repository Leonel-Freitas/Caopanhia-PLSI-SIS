<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Marcacoesveterinarias;

/**
 * MarcacoesveterinariasSearch represents the model behind the search form of `common\models\Marcacoesveterinarias`.
 */
class MarcacoesveterinariasSearch extends Marcacoesveterinarias
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idClient', 'idVet', 'idCao', 'idConsulta'], 'integer'],
            [['data'], 'safe'],
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
        $query = Marcacoesveterinarias::find();

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
            'data' => $this->data,
            'idClient' => $this->idClient,
            'idVet' => $this->idVet,
            'idCao' => $this->idCao,
            'idConsulta' => $this->idConsulta,
        ]);

        return $dataProvider;
    }
}
