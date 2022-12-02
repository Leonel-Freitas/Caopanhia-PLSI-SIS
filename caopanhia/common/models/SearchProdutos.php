<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Produtos;

/**
 * SearchProdutos represents the model behind the search form of `common\models\Produtos`.
 */
class SearchProdutos extends Produtos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'stock', 'idCategoria'], 'integer'],
            [['imagem', 'designacao'], 'safe'],
            [['valor'], 'number'],
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
        $query = Produtos::find();

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
            'valor' => $this->valor,
            'stock' => $this->stock,
            'idCategoria' => $this->idCategoria,
        ]);

        $query->andFilterWhere(['like', 'imagem', $this->imagem])
            ->andFilterWhere(['like', 'designacao', $this->designacao]);

        return $dataProvider;
    }
}
