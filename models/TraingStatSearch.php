<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TrainingStat;

/**
 * TraingStatSearch represents the model behind the search form of `app\models\TrainingStat`.
 */
class TraingStatSearch extends TrainingStat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'training_id', 'user_id', 'apply_department_id', 'created_at', 'updated_at', 'status', 'process_department_id'], 'integer'],
            [['extro'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = TrainingStat::find();

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
            'id' => $this->id,
            'training_id' => $this->training_id,
            'user_id' => $this->user_id,
            'apply_department_id' => $this->apply_department_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'status' => $this->status,
            'process_department_id' => $this->process_department_id,
        ]);

        $query->andFilterWhere(['like', 'extro', $this->extro]);

        return $dataProvider;
    }
}
