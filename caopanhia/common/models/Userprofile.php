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
 * @property string|null $imagem
 *
 * @property Anuncios[] $anuncios
 * @property Caes[] $caes
 * @property Comentarios[] $comentarios
 * @property Encomendas[] $encomendas
 * @property Distritos $idDistrito0
 * @property User $idUser0
 * @property Marcacoesveterinarias[] $marcacoesveterinarias
 * @property Marcacoesveterinarias[] $marcacoesveterinarias0
 */
class Userprofile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $imageFile;

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
            [['nif', 'contacto', 'idUser'], 'integer'],
            [['nome', 'morada', 'formacao'], 'string', 'max' => 255],
            [['codigoPostal'], 'string', 'max' => 8],
            [['genero'], 'string', 'max' => 10],
            [['imagem'], 'string', 'max' => 250],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
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
            'imagem' => 'Imagem',
        ];
    }

    /**
     * Gets query for [[Anuncios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncios()
    {
        return $this->hasMany(Anuncios::class, ['idUser' => 'id']);
    }

    /**
     * Gets query for [[Caes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaes()
    {
        return $this->hasMany(Caes::class, ['idUserProfile' => 'id']);
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::class, ['idUser' => 'id']);
    }

    /**
     * Gets query for [[Encomendas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEncomendas()
    {
        return $this->hasMany(Encomendas::class, ['idUser' => 'id']);
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

    /**
     * Gets query for [[Marcacoesveterinarias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarcacoesveterinarias()
    {
        return $this->hasMany(Marcacoesveterinarias::class, ['idClient' => 'id']);
    }

    /**
     * Gets query for [[Marcacoesveterinarias0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarcacoesveterinarias0()
    {
        return $this->hasMany(Marcacoesveterinarias::class, ['idVet' => 'id']);
    }

    public function upload() {

        if (true) {
            $this->imageFile->saveAs(Yii::getAlias('@webroot') . '/images/User/' . $this->imageFile->name);
            return true;
        } else {
            return false;
        }
    }
}
