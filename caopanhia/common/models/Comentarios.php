<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comentarios".
 *
 * @property int $id
 * @property string $descricao
 * @property int $idAnuncio
 * @property int $idUser
 *
 * @property Anuncios $idAnuncio0
 * @property Userprofile $idUser0
 */
class Comentarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descricao', 'idAnuncio', 'idUser'], 'required'],
            [['idAnuncio', 'idUser'], 'integer'],
            [['descricao'], 'string', 'max' => 250],
            [['idAnuncio'], 'exist', 'skipOnError' => true, 'targetClass' => Anuncios::class, 'targetAttribute' => ['idAnuncio' => 'id']],
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
            'idAnuncio' => 'Id Anuncio',
            'idUser' => 'Id User',
        ];
    }

    /**
     * Gets query for [[IdAnuncio0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdAnuncio0()
    {
        return $this->hasOne(Anuncios::class, ['id' => 'idAnuncio']);
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
