<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * VisitSearch represents the model behind the search form about `frontend\models\Visit`.
 */
class VisitSearch extends Visit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
//        return [
//            [['visit_id', 'visit_user_id', 'visit_master_id', 'visit_service_id'], 'integer'],
//            [['visit_date_time'], 'safe'],
//        ];
        return [
            [['visit_id'], 'integer'],
            [['visit_date_time', 'visit_master_id', 'visit_service_id', 'visit_user_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Visit::find()->where(['visit_user_id' => Yii::$app->user->getId()]);//corrected for view visits only for current logged user

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'visit_id' => $this->visit_id,
            'visit_date_time' => $this->visit_date_time,
            'visit_user_id' => $this->visit_user_id,
            'visit_master_id' => $this->visit_master_id,
            'visit_service_id' => $this->visit_service_id,
        ]);

        return $dataProvider;
    }
}
