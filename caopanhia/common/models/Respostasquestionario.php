<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "respostasquestionario".
 *
 * @property int $id
 * @property string $resposta
 * @property int $idUser
 * @property int $idPergunta
 *
 * @property Questionario $idPergunta0
 * @property Userprofile $idUser0
 */
class Respostasquestionario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'respostasquestionario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resposta', 'idUser', 'idPergunta'], 'required'],
            [['idUser', 'idPergunta'], 'integer'],
            [['resposta'], 'string', 'max' => 3],
            [['idPergunta'], 'exist', 'skipOnError' => true, 'targetClass' => Questionario::class, 'targetAttribute' => ['idPergunta' => 'id']],
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
            'resposta' => 'Resposta',
            'idUser' => 'Id User',
            'idPergunta' => 'Id Pergunta',
        ];
    }

    /**
     * Gets query for [[IdPergunta0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdPergunta0()
    {
        return $this->hasOne(Questionario::class, ['id' => 'idPergunta']);
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
