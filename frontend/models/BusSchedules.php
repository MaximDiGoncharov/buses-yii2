<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bus_schedules".
 *
 * @property int $id
 * @property int|null $route_id
 * @property string|null $arrival_time
 *
 * @property Routes $route
 */
class BusSchedules extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bus_schedules';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['route_id'], 'default', 'value' => null],
            [['route_id'], 'integer'],
            [['arrival_time'], 'safe'],
            [['route_id'], 'exist', 'skipOnError' => true, 'targetClass' => Routes::class, 'targetAttribute' => ['route_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'route_id' => 'Route ID',
            'arrival_time' => 'Arrival Time',
        ];
    }

    /**
     * Gets query for [[Route]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoute()
    {
        return $this->hasOne(Routes::class, ['id' => 'route_id']);
    }
}
