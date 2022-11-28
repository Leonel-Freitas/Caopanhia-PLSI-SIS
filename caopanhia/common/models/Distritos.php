<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "distritos".
 *
 * @property int $id
 * @property string|null $designacao
 * @property int|null $status
 *
 * @property Userprofile[] $userprofiles
 */
class Distritos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'distritos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['designacao'], 'string', 'max' => 255],
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
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Userprofiles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserprofiles()
    {
        return $this->hasMany(Userprofile::class, ['idDistrito' => 'id']);
    }



}
