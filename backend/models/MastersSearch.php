<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * MastersSearch represents the model behind the search form about `backend\models\Masters`.
 */
class MastersSearch extends Masters
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['masters_id', 'masters_rate'], 'integer'],
            [['masters_first_name', 'masters_services_id', 'masters_last_name', 'masters_email', 'masters_photo', 'masters_created_date', 'masters_status'], 'safe'],
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
        $query->joinWith('mastersServices');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([//castomize sort of the data
            'attributes' => [
                'masters_services_id' => [//fields with data replaced with data from related tables
                    'asc' => ['services_name' => SORT_ASC],
                    'desc' => ['services_name' => SORT_DESC],
                ],
                'masters_first_name',
                'masters_last_name',
                'masters_photo',
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->joinWith('mastersServices');

        $query->andFilterWhere([
            'masters_id' => $this->masters_id,
            'masters_rate' => $this->masters_rate,
            'masters_created_date' => $this->masters_created_date,
            // 'masters_services_id' => $this->masters_services_id,
        ]);

        $query->andFilterWhere(['like', 'masters_first_name', $this->masters_first_name])
            ->andFilterWhere(['like', 'masters_last_name', $this->masters_last_name])
            ->andFilterWhere(['like', 'masters_email', $this->masters_email])
            ->andFilterWhere(['like', 'masters_photo', $this->masters_photo])
            ->andFilterWhere(['like', 'masters_status', $this->masters_status])
            ->andFilterWhere(['like', 'services.services_name', $this->masters_services_id]);

        return $dataProvider;
    }
}
