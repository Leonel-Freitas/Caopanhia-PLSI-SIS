<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Anuncios;

/**
 * AnunciosSearch represents the model behind the search form of `common\models\Anuncios`.
 */
class AnunciosSearch extends Anuncios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'idCao', 'idUser'], 'integer'],
            [['descricao', 'dataCriacao'], 'safe'],
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
        $query = Anuncios::find();

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
            'dataCriacao' => $this->dataCriacao,
            'idCao' => $this->idCao,
            'idUser' => $this->idUser,
        ]);

        $query->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
