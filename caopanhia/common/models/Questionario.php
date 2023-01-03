<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "questionario".
 *
 * @property int $id
 * @property string $pergunta
 * @property int $pontosSim
 * @property int $pontosNao
 *
 * @property Respostasquestionario[] $respostasquestionarios
 */
class Questionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pergunta', 'pontosSim', 'pontosNao'], 'required'],
            [['pontosSim', 'pontosNao'], 'integer'],
            [['pergunta'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pergunta' => 'Pergunta',
            'pontosSim' => 'Pontos Sim',
            'pontosNao' => 'Pontos Nao',
        ];
    }

    /**
     * Gets query for [[Respostasquestionarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRespostasquestionarios()
    {
        return $this->hasMany(Respostasquestionario::class, ['idPergunta' => 'id']);
    }
}
