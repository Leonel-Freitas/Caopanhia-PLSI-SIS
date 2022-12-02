<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categorias".
 *
 * @property int $id
 * @property string $designacao
 * @property int|null $status
 *
 * @property Produtos[] $produtos
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['designacao'], 'required'],
            [['status'], 'integer'],
            [['designacao'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'designacao' => 'Designacao',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Produtos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProdutos()
    {
        return $this->hasMany(Produtos::class, ['idCategoria' => 'id']);
    }
}
