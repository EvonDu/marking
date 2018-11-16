<?php

namespace common\models\score;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\score\ScoreInvest;

/**
 * ScoreInvestSearch represents the model behind the search form of `common\models\score\ScoreInvest`.
 */
class ScoreInvestSearch extends ScoreInvest
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'integer'],
            [['fund'], 'number'],
            [['num'], 'string'],
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
        $query = ScoreInvest::find();

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
            'user_id' => $this->user_id,
            'fund' => $this->fund,
        ]);

        return $dataProvider;
    }
}