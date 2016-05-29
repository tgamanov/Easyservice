<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * MastersSearch represents the model behind the search form about `frontend\models\Masters`.
 */
class MastersSearch extends Masters
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['masters_id', 'masters_rate', 'masters_services_id'], 'integer'],
            [['masters_first_name', 'masters_last_name', 'masters_email', 'masters_photo', 'masters_created_date', 'masters_status'], 'safe'],
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
        $query = Masters::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'masters_id' => $this->masters_id,
            'masters_rate' => $this->masters_rate,
            'masters_created_date' => $this->masters_created_date,
            'masters_services_id' => $this->masters_services_id,
        ]);

        $query->andFilterWhere(['like', 'masters_first_name', $this->masters_first_name])
            ->andFilterWhere(['like', 'masters_last_name', $this->masters_last_name])
            ->andFilterWhere(['like', 'masters_email', $this->masters_email])
            ->andFilterWhere(['like', 'masters_photo', $this->masters_photo])
            ->andFilterWhere(['like', 'masters_status', $this->masters_status]);

        return $dataProvider;
    }
}
