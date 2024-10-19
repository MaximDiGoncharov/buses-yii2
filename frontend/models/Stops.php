<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stops".
 *
 * @property int $stop_id
 * @property string $stop_name
 * @property float|null $latitude
 * @property float|null $longitude
 *
 * @property RouteStops[] $routeStops
 * @property Routes[] $routes
 * @property Routes[] $routes0
 * @property Schedule[] $schedules
 */
class Stops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'stops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['stop_name'], 'required'],
            [['latitude', 'longitude'], 'number'],
            [['stop_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'stop_id' => 'Stop ID',
            'stop_name' => 'Stop Name',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }

    /**
     * Gets query for [[RouteStops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRouteStops()
    {
        return $this->hasMany(RouteStops::class, ['stop_id' => 'stop_id']);
    }

    /**
     * Gets query for [[Routes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoutes()
    {
        return $this->hasMany(Routes::class, ['start_stop_id' => 'stop_id']);
    }

    /**
     * Gets query for [[Routes0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoutes0()
    {
        return $this->hasMany(Routes::class, ['end_stop_id' => 'stop_id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::class, ['stop_id' => 'stop_id']);
    }
}
