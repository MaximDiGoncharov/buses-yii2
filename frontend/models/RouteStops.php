<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "route_stops".
 *
 * @property int $route_stop_id
 * @property int|null $route_id
 * @property int|null $stop_id
 * @property int $sequence_number
 * @property string|null $direction
 *
 * @property Routes $route
 * @property Stops $stop
 */
class RouteStops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'route_stops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['route_id', 'stop_id', 'sequence_number'], 'default', 'value' => null],
            [['route_id', 'stop_id', 'sequence_number'], 'integer'],
            [['sequence_number'], 'required'],
            [['direction'], 'string', 'max' => 10],
            [['route_id'], 'exist', 'skipOnError' => true, 'targetClass' => Routes::class, 'targetAttribute' => ['route_id' => 'route_id']],
            [['stop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stops::class, 'targetAttribute' => ['stop_id' => 'stop_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'route_stop_id' => 'Route Stop ID',
            'route_id' => 'Route ID',
            'stop_id' => 'Stop ID',
            'sequence_number' => 'Sequence Number',
            'direction' => 'Direction',
        ];
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
     * Gets query for [[Stop]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStop()
    {
        return $this->hasOne(Stops::class, ['stop_id' => 'stop_id']);
    }
}
