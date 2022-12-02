<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "produtos".
 *
 * @property int $id
 * @property string|null $imagem
 * @property string $designacao
 * @property float $valor
 * @property int $stock
 * @property int $idCategoria
 *
 * @property Carrinho[] $carrinhos
 * @property Categorias $idCategoria0
 * @property Encomendas[] $idEncomendas
 */
class Produtos extends \yii\db\ActiveRecord
{

    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produtos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['designacao', 'valor', 'stock', 'idCategoria'], 'required'],
            [['valor'], 'number'],
            [['stock', 'idCategoria'], 'integer'],
            [['imagem', 'designacao'], 'string', 'max' => 250],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['idCategoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categorias::class, 'targetAttribute' => ['idCategoria' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'imagem' => 'Imagem',
            'designacao' => 'Designacao',
            'valor' => 'Valor',
            'stock' => 'Stock',
            'idCategoria' => 'Id Categoria',
        ];
    }

    /**
     * Gets query for [[Carrinhos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCarrinhos()
    {
        return $this->hasMany(Carrinho::class, ['idProduto' => 'id']);
    }

    /**
     * Gets query for [[IdCategoria0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategoria0()
    {
        return $this->hasOne(Categorias::class, ['id' => 'idCategoria']);
    }

    /**
     * Gets query for [[IdEncomendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEncomendas()
    {
        return $this->hasMany(Encomendas::class, ['id' => 'idEncomenda'])->viaTable('carrinho', ['idProduto' => 'id']);
    }

    public function upload() {

        if (true) {
            $this->imageFile->saveAs(Yii::getAlias('@webroot') . '/images/produtos/' . $this->imageFile->name);
            return true;
        } else {
            return false;
        }
    }
}
