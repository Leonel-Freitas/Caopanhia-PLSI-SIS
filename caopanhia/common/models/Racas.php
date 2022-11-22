<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "racas".
 *
 * @property int $id
 * @property string $designacao
 * @property int $pontos
 * @property int $status
 */
class Racas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'racas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['designacao', 'pontos', 'status'], 'required'],
            [['pontos', 'status'], 'integer'],
            [['designacao'], 'string', 'max' => 250],
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
            'pontos' => 'Pontos',
            'status' => 'Status',
        ];
    }
}
