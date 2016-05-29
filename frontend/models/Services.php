<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property integer $services_id
 * @property string $services_name
 * @property string $services_created_date
 * @property string $status
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['services_created_date'], 'safe'],
            [['status'], 'string'],
            [['services_name'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'services_id' => 'Services ID',
            'services_name' => 'Services Name',
            'services_created_date' => 'Services Created Date',
            'status' => 'Status',
        ];
    }
}
