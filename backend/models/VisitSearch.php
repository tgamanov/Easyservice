<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * VisitSearch represents the model behind the search form about `backend\models\Visit`.
 */
class VisitSearch extends Visit
{
    /**
     * @inheritdoc
     */

    public $pageSearch;

    public function rules()
    {
        return [
            [['visit_id'], 'integer'],
            [['visit_date_time', 'pageSearch', 'visit_master_id', 'visit_service_id', 'visit_user_id'], 'safe'],
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
        $query = Visit::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('visitMaster');
        $query->joinWith('visitService');
        $query->joinWith('visitUser');

        $query->orFilterWhere(['like', 'services_name', $this->pageSearch])
            ->orFilterWhere(['like', 'masters_last_name', $this->pageSearch])
            ->orFilterWhere(['like', 'visit_date_time', $this->pageSearch])
            ->orFilterWhere(['like', 'last_name', $this->pageSearch]);


        return $dataProvider;
    }
}
