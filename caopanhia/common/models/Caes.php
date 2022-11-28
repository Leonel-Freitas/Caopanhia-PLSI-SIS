<?php

namespace common\models;

use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * This is the model class for table "caes".
 *
 * @property int $id
 * @property string|null $imagem
 * @property string $nome
 * @property string $anoNascimento
 * @property string $genero
 * @property string $microship
 * @property string $castrado
 * @property int|null $pedidoConsulta
 * @property string|null $adotado
 * @property int $idUserProfile
 * @property int $idRaca
 *
 * @property Anuncios[] $anuncios
 * @property Racas $idRaca0
 * @property Userprofile $idUserProfile0
 * @property Marcacoesveterinarias[] $marcacoesveterinarias
 */
class Caes extends \yii\db\ActiveRecord
{

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'caes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'anoNascimento', 'genero', 'microship', 'castrado', 'idUserProfile', 'idRaca'], 'required'],
            [['anoNascimento'], 'safe'],
            [['pedidoConsulta', 'idUserProfile', 'idRaca'], 'integer'],
            [['imagem'], 'string', 'max' => 250],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
            [['nome'], 'string', 'max' => 30],
            [['genero'], 'string', 'max' => 10],
            [['microship', 'castrado'], 'string', 'max' => 20],
            [['adotado'], 'string', 'max' => 3],
            [['idUserProfile'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::class, 'targetAttribute' => ['idUserProfile' => 'id']],
            [['idRaca'], 'exist', 'skipOnError' => true, 'targetClass' => Racas::class, 'targetAttribute' => ['idRaca' => 'id']],
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
            'nome' => 'Nome',
            'anoNascimento' => 'Ano Nascimento',
            'genero' => 'Genero',
            'microship' => 'Microship',
            'castrado' => 'Castrado',
            'pedidoConsulta' => 'Pedido Consulta',
            'adotado' => 'Adotado',
            'idUserProfile' => 'Id User Profile',
            'idRaca' => 'Id Raca',
        ];
    }

    /**
     * Gets query for [[Anuncios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnuncios()
    {
        return $this->hasMany(Anuncios::class, ['idCao' => 'id']);
    }

    /**
     * Gets query for [[IdRaca0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdRaca0()
    {
        return $this->hasOne(Racas::class, ['id' => 'idRaca']);
    }

    /**
     * Gets query for [[IdUserProfile0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUserProfile0()
    {
        return $this->hasOne(Userprofile::class, ['id' => 'idUserProfile']);
    }

    /**
     * Gets query for [[Marcacoesveterinarias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarcacoesveterinarias()
    {
        return $this->hasMany(Marcacoesveterinarias::class, ['idCao' => 'id']);
    }

    public function upload() {

        if (true) {
            $this->imageFile->saveAs(Yii::getAlias('@webroot') . '/images/caes/' . $this->imageFile->name);
            return true;
        } else {
            return false;
        }
    }

    }
