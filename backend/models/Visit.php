<?php

namespace backend\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "visit".
 *
 * @property integer $visit_id
 * @property string $visit_date_time
 * @property integer $visit_user_id
 * @property integer $visit_master_id
 * @property integer $visit_service_id
 *
 * @property Masters $visitMaster
 * @property Services $visitService
 */
class Visit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // [['visit_date_time'], 'safe'],
            [['visit_user_id', 'visit_master_id', 'visit_service_id'], 'integer'],
            [['visit_user_id', 'visit_master_id', 'visit_date_time', 'visit_service_id'], 'required'],
            [['visit_date_time'], 'checkDateTime']
        ];
    }

    public function checkDateTime($attribute, $params)
    {
        $today = date('Y-m-d h:m:s');
        $selectedDate = date($this->visit_date_time);
        if ($selectedDate < $today) {
            $this->addError($attribute, 'Visit start date and time should be later than right now');
        }
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'visit_id' => 'Visit ID',
            'visit_date_time' => 'Visit Date Time',
            'visit_user_id' => 'User Last name',
            'visit_master_id' => 'Master last name',
            'visit_service_id' => 'Service name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitMaster()
    {
        return $this->hasOne(Masters::className(), ['masters_id' => 'visit_master_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitService()
    {
        return $this->hasOne(Services::className(), ['services_id' => 'visit_service_id']);
    }

    public function getVisitUser()
    {
        return $this->hasOne(User::className(), ['id' => 'visit_user_id']);
    }
}

