<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "userprofile".
 *
 * @property int $id
 * @property string $nome
 * @property string $morada
 * @property string $codigoPostal
 * @property string $genero
 * @property int $nif
 * @property int $contacto
 * @property int|null $idUser
 * @property int|null $idDistrito
 * @property string|null $formacao
 *
 * @property Distritos $idDistrito0
 * @property User $idUser0
 */
class Userprofile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'userprofile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'morada', 'codigoPostal', 'genero', 'nif', 'contacto'], 'required'],
            [['nif', 'contacto', 'idUser', 'idDistrito'], 'integer'],
            [['nome', 'morada', 'formacao'], 'string', 'max' => 255],
            [['codigoPostal'], 'string', 'max' => 8],
            [['genero'], 'string', 'max' => 10],
            [['nif'], 'unique'],
            [['idUser'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['idUser' => 'id']],
            [['idDistrito'], 'exist', 'skipOnError' => true, 'targetClass' => Distritos::class, 'targetAttribute' => ['idDistrito' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'morada' => 'Morada',
            'codigoPostal' => 'Codigo Postal',
            'genero' => 'Genero',
            'nif' => 'Nif',
            'contacto' => 'Contacto',
            'idUser' => 'Id User',
            'idDistrito' => 'Id Distrito',
            'formacao' => 'Formacao',
        ];
    }

    /**
     * Gets query for [[IdDistrito0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdDistrito0()
    {
        return $this->hasOne(Distritos::class, ['id' => 'idDistrito']);
    }

    /**
     * Gets query for [[IdUser0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUser0()
    {
        return $this->hasOne(User::class, ['id' => 'idUser']);
    }


}
