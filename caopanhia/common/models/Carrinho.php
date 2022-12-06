<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "carrinho".
 *
 * @property int $idEncomenda
 * @property int $idProduto
 * @property int|null $quantidade
 * @property float|null $valorPago
 *
 * @property Encomendas $idEncomenda0
 * @property Produtos $idProduto0
 */
class Carrinho extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'carrinho';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idEncomenda', 'idProduto'], 'required'],
            [['idEncomenda', 'idProduto', 'quantidade'], 'integer'],
            [['valorPago'], 'number'],
            [['idEncomenda', 'idProduto'], 'unique', 'targetAttribute' => ['idEncomenda', 'idProduto']],
            [['idEncomenda'], 'exist', 'skipOnError' => true, 'targetClass' => Encomendas::class, 'targetAttribute' => ['idEncomenda' => 'id']],
            [['idProduto'], 'exist', 'skipOnError' => true, 'targetClass' => Produtos::class, 'targetAttribute' => ['idProduto' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idEncomenda' => 'Id Encomenda',
            'idProduto' => 'Id Produto',
            'quantidade' => 'Quantidade',
            'valorPago' => 'Valor Pago',
        ];
    }

    /**
     * Gets query for [[IdEncomenda0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEncomenda0()
    {
        return $this->hasOne(Encomendas::class, ['id' => 'idEncomenda']);
    }

    /**
     * Gets query for [[IdProduto0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProduto0()
    {
        return $this->hasOne(Produtos::class, ['id' => 'idProduto']);
    }
}
