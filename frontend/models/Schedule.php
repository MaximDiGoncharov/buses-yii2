<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "schedule".
 *
 * @property int $schedule_id
 * @property int|null $trip_id
 * @property int|null $stop_id
 * @property string|null $arrival_time
 * @property string|null $departure_time
 *
 * @property Stops $stop
 * @property Trips $trip
 */
class Schedule extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['trip_id', 'stop_id'], 'default', 'value' => null],
            [['trip_id', 'stop_id'], 'integer'],
            [['arrival_time', 'departure_time'], 'safe'],
            [['stop_id'], 'exist', 'skipOnError' => true, 'targetClass' => Stops::class, 'targetAttribute' => ['stop_id' => 'stop_id']],
            [['trip_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trips::class, 'targetAttribute' => ['trip_id' => 'trip_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'schedule_id' => 'Schedule ID',
            'trip_id' => 'Trip ID',
            'stop_id' => 'Stop ID',
            'arrival_time' => 'Arrival Time',
            'departure_time' => 'Departure Time',
        ];
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

    /**
     * Gets query for [[Trip]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTrip()
    {
        return $this->hasOne(Trips::class, ['trip_id' => 'trip_id']);
    }
}
