<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "consultas".
 *
 * @property int $id
 * @property string $tratamento
 * @property string $diagonostico
 * @property string|null $notas
 *
 * @property Marcacoesveterinarias[] $marcacoesveterinarias
 */
class Consultas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'consultas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tratamento', 'diagonostico'], 'required'],
            [['tratamento', 'diagonostico', 'notas'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tratamento' => 'Tratamento',
            'diagonostico' => 'Diagonostico',
            'notas' => 'Notas',
        ];
    }

    /**
     * Gets query for [[Marcacoesveterinarias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarcacoesveterinarias()
    {
        return $this->hasMany(Marcacoesveterinarias::class, ['idConsulta' => 'id']);
    }
}
