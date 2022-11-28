<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "anuncios".
 *
 * @property int $id
 * @property string $descricao
 * @property string $dataCriacao
 * @property string|null $dataAdocao
 * @property int $idCao
 * @property int $idUser
 *
 * @property Comentarios[] $comentarios
 * @property Caes $idCao0
 * @property Userprofile $idUser0
 */
class Anuncios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anuncios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'dataCriacao', 'idCao', 'idUser'], 'required'],
            [['dataCriacao', 'dataAdocao'], 'safe'],
            [['idCao', 'idUser'], 'integer'],
            [['descricao'], 'string', 'max' => 250],
            [['idCao'], 'exist', 'skipOnError' => true, 'targetClass' => Caes::class, 'targetAttribute' => ['idCao' => 'id']],
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
            'descricao' => 'Descricao',
            'dataCriacao' => 'Data Criacao',
            'dataAdocao' => 'Data Adocao',
            'idCao' => 'Id Cao',
            'idUser' => 'Id User',
        ];
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::class, ['idAnuncio' => 'id']);
    }

    /**
     * Gets query for [[IdCao0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdCao0()
    {
        return $this->hasOne(Caes::class, ['id' => 'idCao']);
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
