<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "visit".
 *
 * @property integer $visit_id
 * @property string $visit_date_time
 * @property integer $visit_user_id
 * @property integer $visit_master_id
 * @property integer $visit_service_id
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
//        return [
//            [['visit_date_time'], 'safe'],
//            [['visit_user_id', 'visit_master_id', 'visit_service_id'], 'required'],
//            [['visit_user_id', 'visit_master_id', 'visit_service_id'], 'integer'],
//            [['visit_master_id'], 'exist', 'skipOnError' => true, 'targetClass' => Masters::className(), 'targetAttribute' => ['visit_master_id' => 'masters_id']],
//            [['visit_service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['visit_service_id' => 'services_id']],
//            [['visit_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['visit_user_id' => 'id']],
//        ];
        return [
            // [['visit_date_time'], 'safe'],
            [['visit_user_id', 'visit_master_id', 'visit_service_id'], 'integer'],
            [['visit_master_id', 'visit_date_time', 'visit_service_id'], 'required'],
            [['visit_date_time'], 'checkDateTime']
        ];

    }

    public function checkDateTime($attribute, $params) //check if date of the visit is not past
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
            'visit_user_id' => 'Visit User ID',
            'visit_master_id' => 'Name of the Master',
            'visit_service_id' => 'Kind of the service',//forms texts
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitMaster()//get connected data from masters table
    {
        return $this->hasOne(Masters::className(), ['masters_id' => 'visit_master_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVisitService()//get connected data from services table
    {
        return $this->hasOne(Services::className(), ['services_id' => 'visit_service_id']);
    }

    public function getVisitUser() //get connected data from services table
    {
        return $this->hasOne(User::className(), ['id' => 'visit_user_id']);
    }
}

