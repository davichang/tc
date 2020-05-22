<?php

namespace app\modules\admin\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Training;

/**
 * TrainingSearch represents the model behind the search form of `app\models\Training`.
 */
class TrainingSearch extends Training
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'apply_department_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'teacher', 'content', 'department_ids', 'training_time', 'extro'], 'safe'],
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
        $query = Training::find();

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
            'training_time' => $this->training_time,
            'apply_department_id' => $this->apply_department_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'teacher', $this->teacher])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'department_ids', $this->department_ids])
            ->andFilterWhere(['like', 'extro', $this->extro]);

        return $dataProvider;
    }
}
