<?php

namespace common\models\score;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\score\ScoreSubmit;

/**
 * ScoreSubmitSearch represents the model behind the search form of `common\models\score\ScoreSubmit`.
 */
class ScoreSubmitSearch extends ScoreSubmit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'fund', 's1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10'], 'integer'],
            [['num'], 'safe'],
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
        $query = ScoreSubmit::find();

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
            's1' => $this->s1,
            's2' => $this->s2,
            's3' => $this->s3,
            's4' => $this->s4,
            's5' => $this->s5,
            's6' => $this->s6,
            's7' => $this->s7,
            's8' => $this->s8,
            's9' => $this->s9,
            's10' => $this->s10,
        ]);

        $query->andFilterWhere(['like', 'num', $this->num]);

        return $dataProvider;
    }
}
