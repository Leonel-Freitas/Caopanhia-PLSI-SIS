<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "marcacoesveterinarias".
 *
 * @property int $id
 * @property string $data
 * @property string $hora
 * @property int $idClient
 * @property int $idVet
 * @property int $idCao
 * @property int $idConsulta
 *
 * @property Caes $idCao0
 * @property Userprofile $idClient0
 * @property Consultas $idConsulta0
 * @property Userprofile $idVet0
 */
class Marcacoesveterinarias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'marcacoesveterinarias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data', 'hora', 'idClient', 'idVet', 'idCao', 'idConsulta'], 'required'],
            [['data', 'hora'], 'safe'],
            [['idClient', 'idVet', 'idCao', 'idConsulta'], 'integer'],
            [['idClient'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::class, 'targetAttribute' => ['idClient' => 'id']],
            [['idVet'], 'exist', 'skipOnError' => true, 'targetClass' => Userprofile::class, 'targetAttribute' => ['idVet' => 'id']],
            [['idCao'], 'exist', 'skipOnError' => true, 'targetClass' => Caes::class, 'targetAttribute' => ['idCao' => 'id']],
            [['idConsulta'], 'exist', 'skipOnError' => true, 'targetClass' => Consultas::class, 'targetAttribute' => ['idConsulta' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data' => 'Data',
            'hora' => 'Hora',
            'idClient' => 'Id Client',
            'idVet' => 'Id Vet',
            'idCao' => 'Id Cao',
            'idConsulta' => 'Id Consulta',
        ];
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
     * Gets query for [[IdClient0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdClient0()
    {
        return $this->hasOne(Userprofile::class, ['id' => 'idClient']);
    }

    /**
     * Gets query for [[IdConsulta0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdConsulta0()
    {
        return $this->hasOne(Consultas::class, ['id' => 'idConsulta']);
    }

    /**
     * Gets query for [[IdVet0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdVet0()
    {
        return $this->hasOne(Userprofile::class, ['id' => 'idVet']);
    }
}
