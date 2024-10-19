<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "buses".
 *
 * @property int $bus_id
 * @property string $bus_number
 * @property int $capacity
 *
 * @property Trips[] $trips
 */
class Buses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'buses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bus_number', 'capacity'], 'required'],
            [['capacity'], 'default', 'value' => null],
            [['capacity'], 'integer'],
            [['bus_number'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bus_id' => 'Bus ID',
            'bus_number' => 'Bus Number',
            'capacity' => 'Capacity',
        ];
    }

    /**
     * Gets query for [[Trips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trips::class, ['bus_id' => 'bus_id']);
    }
}
