<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stops".
 *
 * @property int $id
 * @property string $name
 * @property float|null $latitude
 * @property float|null $longitude
 *
 * @property RouteStops[] $routeStops
 * @property Routes[] $routes
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
            [['name'], 'required'],
            [['latitude', 'longitude'], 'number'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
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
        return $this->hasMany(RouteStops::class, ['stop_id' => 'id']);
    }

    /**
     * Gets query for [[Routes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoutes()
    {
        return $this->hasMany(Routes::class, ['end_stop_id' => 'id']);
    }
}
