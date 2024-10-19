<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "routes".
 *
 * @property int $id
 * @property string $name
 * @property int|null $end_stop_id
 *
 * @property BusSchedules[] $busSchedules
 * @property Stops $endStop
 * @property RouteStops[] $routeStops
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
            [['name'], 'required'],
            [['end_stop_id'], 'default', 'value' => null],
            [['end_stop_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['end_stop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stops::class, 'targetAttribute' => ['end_stop_id' => 'id']],
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
            'end_stop_id' => 'End Stop ID',
        ];
    }

    /**
     * Gets query for [[BusSchedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBusSchedules()
    {
        return $this->hasMany(BusSchedules::class, ['route_id' => 'id']);
    }

    /**
     * Gets query for [[EndStop]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEndStop()
    {
        return $this->hasOne(Stops::class, ['id' => 'end_stop_id']);
    }

    /**
     * Gets query for [[RouteStops]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRouteStops()
    {
        return $this->hasMany(RouteStops::class, ['route_id' => 'id']);
    }
}
