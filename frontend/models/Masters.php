<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "masters".
 *
 * @property integer $masters_id
 * @property string $masters_first_name
 * @property string $masters_last_name
 * @property string $masters_email
 * @property string $masters_photo
 * @property integer $masters_rate
 * @property string $masters_created_date
 * @property string $masters_status
 * @property integer $masters_services_id
 *
 * @property Services $mastersServices
 * @property Visit[] $visits
 */
class Masters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'masters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['masters_services_id', 'file'], 'required'],
            [['masters_id', 'masters_rate', 'masters_services_id'], 'integer'],
            [['masters_created_date'], 'safe'],
            [['file'], 'file'],
            [['masters_status'], 'string'],
            [['masters_first_name', 'masters_last_name', 'masters_email', 'masters_photo'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'masters_id' => 'Masters ID',
            'masters_first_name' => 'Masters First Name',
            'masters_last_name' => 'Masters Last Name',
            'masters_photo' => 'Masters Photo',
            'masters_rate' => 'Masters Rate',
            'masters_created_date' => 'Masters Created Date',
            'masters_status' => 'Masters Status',
            'masters_services_id' => 'Service name',
            'file' => 'Masters Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMastersServices()
    {
        return $this->hasOne(Services::className(), ['services_id' => 'masters_services_id']);
    }

    public function getVisits()
    {
        return $this->hasMany(Visit::className(), ['visit_master_id' => 'masters_id']);
    }
}
