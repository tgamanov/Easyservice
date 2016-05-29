<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property integer $id
 * @property string $active
 * @property integer $weight
 * @property string $title
 * @property string $url
 * @property string $position
 * @property string $date_created
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active'], 'string'],
            [['weight'], 'integer'],
            [['date_created'], 'safe'],
            [['title', 'url', 'position'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'active' => 'Active',
            'weight' => 'Weight',
            'title' => 'Title',
            'url' => 'Url',
            'position' => 'Position',
            'date_created' => 'Date Created',
        ];
    }
}
