<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trips".
 *
 * @property int $trip_id
 * @property int|null $route_id
 * @property int|null $bus_id
 * @property string|null $departure_time
 * @property string|null $arrival_time
 *
 * @property Buses $bus
 * @property Routes $route
 * @property Schedule[] $schedules
 */
class Trips extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trips';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['route_id', 'bus_id'], 'default', 'value' => null],
            [['route_id', 'bus_id'], 'integer'],
            [['departure_time', 'arrival_time'], 'safe'],
            [['bus_id'], 'exist', 'skipOnError' => true, 'targetClass' => Buses::class, 'targetAttribute' => ['bus_id' => 'bus_id']],
            [['route_id'], 'exist', 'skipOnError' => true, 'targetClass' => Routes::class, 'targetAttribute' => ['route_id' => 'route_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'trip_id' => 'Trip ID',
            'route_id' => 'Route ID',
            'bus_id' => 'Bus ID',
            'departure_time' => 'Departure Time',
            'arrival_time' => 'Arrival Time',
        ];
    }

    /**
     * Gets query for [[Bus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBus()
    {
        return $this->hasOne(Buses::class, ['bus_id' => 'bus_id']);
    }

    /**
     * Gets query for [[Route]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoute()
    {
        return $this->hasOne(Routes::class, ['route_id' => 'route_id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::class, ['trip_id' => 'trip_id']);
    }
}
