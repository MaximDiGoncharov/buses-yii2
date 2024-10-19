<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "routes".
 *
 * @property int $route_id
 * @property string $route_name
 * @property string|null $direction
 * @property int|null $start_stop_id
 * @property int|null $end_stop_id
 *
 * @property Stops $endStop
 * @property RouteStops[] $routeStops
 * @property Stops $startStop
 * @property Trips[] $trips
 */
class Routes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'routes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['route_name'], 'required'],
            [['start_stop_id', 'end_stop_id'], 'default', 'value' => null],
            [['start_stop_id', 'end_stop_id'], 'integer'],
            [['route_name'], 'string', 'max' => 50],
            [['direction'], 'string', 'max' => 10],
            [['start_stop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stops::class, 'targetAttribute' => ['start_stop_id' => 'stop_id']],
            [['end_stop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stops::class, 'targetAttribute' => ['end_stop_id' => 'stop_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'route_id' => 'Route ID',
            'route_name' => 'Route Name',
            'direction' => 'Direction',
            'start_stop_id' => 'Start Stop ID',
            'end_stop_id' => 'End Stop ID',
        ];
    }

    /**
     * Gets query for [[EndStop]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEndStop()
    {
        return $this->hasOne(Stops::class, ['stop_id' => 'end_stop_id']);
    }

    /**
     * Gets query for [[RouteStops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRouteStops()
    {
        return $this->hasMany(RouteStops::class, ['route_id' => 'route_id']);
    }

    /**
     * Gets query for [[StartStop]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStartStop()
    {
        return $this->hasOne(Stops::class, ['stop_id' => 'start_stop_id']);
    }

    /**
     * Gets query for [[Trips]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrips()
    {
        return $this->hasMany(Trips::class, ['route_id' => 'route_id']);
    }
}
