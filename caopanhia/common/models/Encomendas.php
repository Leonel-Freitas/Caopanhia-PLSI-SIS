<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "encomendas".
 *
 * @property int $id
 * @property float|null $valorTotal
 * @property string|null $data
 * @property string|null $finalizada
 * @property int|null $idExpedicao
 * @property int|null $idPagamento
 * @property int $idUser
 * @property string|null $estado
 *
 * @property Carrinho[] $carrinhos
 * @property Tiposexpedicao $idExpedicao0
 * @property Tipospagamento $idPagamento0
 * @property Produtos[] $idProdutos
 * @property Userprofile $idUser0
 */
class Encomendas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'encomendas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['valorTotal'], 'number'],
            [['data'], 'safe'],
            [['idExpedicao', 'idPagamento', 'idUser'], 'integer'],
            [['idUser'], 'required'],
            [['finalizada'], 'string', 'max' => 3],
            [['estado'], 'string', 'max' => 45],
            [['idExpedicao'], 'exist', 'skipOnError' => true, 'targetClass' => Tiposexpedicao::class, 'targetAttribute' => ['idExpedicao' => 'id']],
            [['idPagamento'], 'exist', 'skipOnError' => true, 'targetClass' => Tipospagamento::class, 'targetAttribute' => ['idPagamento' => 'id']],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::class, 'targetAttribute' => ['idUser' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'valorTotal' => 'Valor Total',
            'data' => 'Data',
            'finalizada' => 'Finalizada',
            'idExpedicao' => 'Id Expedicao',
            'idPagamento' => 'Id Pagamento',
            'idUser' => 'Id User',
            'estado' => 'Estado',
        ];
    }

    /**
     * Gets query for [[Carrinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrinhos()
    {
        return $this->hasMany(Carrinho::class, ['idEncomenda' => 'id']);
    }

    /**
     * Gets query for [[IdExpedicao0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdExpedicao0()
    {
        return $this->hasOne(Tiposexpedicao::class, ['id' => 'idExpedicao']);
    }

    /**
     * Gets query for [[IdPagamento0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdPagamento0()
    {
        return $this->hasOne(Tipospagamento::class, ['id' => 'idPagamento']);
    }

    /**
     * Gets query for [[IdProdutos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdProdutos()
    {
        return $this->hasMany(Produtos::class, ['id' => 'idProduto'])->viaTable('carrinho', ['idEncomenda' => 'id']);
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(Userprofile::class, ['id' => 'idUser']);
    }
}
