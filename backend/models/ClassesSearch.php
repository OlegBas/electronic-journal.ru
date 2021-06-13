<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Classes;

/**
 * ClassesSearch represents the model behind the search form of `backend\models\Classes`.
 */
class ClassesSearch extends Classes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'idClRuk', 'prop1', 'prop2', 'prop3', 'prop4', 'prop5', 'prop6', 'prop7', 'prop8', 'prop9'], 'safe'],
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
        $query = Classes::find();

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
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'idClRuk', $this->idClRuk])
            ->andFilterWhere(['like', 'prop1', $this->prop1])
            ->andFilterWhere(['like', 'prop2', $this->prop2])
            ->andFilterWhere(['like', 'prop3', $this->prop3])
            ->andFilterWhere(['like', 'prop4', $this->prop4])
            ->andFilterWhere(['like', 'prop5', $this->prop5])
            ->andFilterWhere(['like', 'prop6', $this->prop6])
            ->andFilterWhere(['like', 'prop7', $this->prop7])
            ->andFilterWhere(['like', 'prop8', $this->prop8])
            ->andFilterWhere(['like', 'prop9', $this->prop9]);

        return $dataProvider;
    }
}
