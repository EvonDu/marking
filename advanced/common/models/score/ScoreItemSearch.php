<?php

namespace common\models\score;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\score\ScoreItem;

/**
 * ScoreItemSearch represents the model behind the search form of `common\models\score\ScoreItem`.
 */
class ScoreItemSearch extends ScoreItem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'max'], 'integer'],
            [['name', 'description'], 'safe'],
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
        $query = ScoreItem::find();

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
            'max' => $this->max,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
