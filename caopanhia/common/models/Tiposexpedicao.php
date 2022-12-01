<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tiposexpedicao".
 *
 * @property int $id
 * @property string $designacao
 * @property float $custo
 * @property string $tempoMedio
 * @property int|null $status
 *
 * @property Encomendas[] $encomendas
 */
class Tiposexpedicao extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tiposexpedicao';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['designacao', 'custo', 'tempoMedio'], 'required'],
            [['custo'], 'number'],
            [['status'], 'integer'],
            [['designacao'], 'string', 'max' => 50],
            [['tempoMedio'], 'string', 'max' => 10],
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
            'custo' => 'Custo',
            'tempoMedio' => 'Tempo Medio',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Encomendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncomendas()
    {
        return $this->hasMany(Encomendas::class, ['idExpedicao' => 'id']);
    }
}
