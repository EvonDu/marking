<?php

namespace common\models\material;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\material\Material;

/**
 * MaterialSearch represents the model behind the search form of `common\models\material\Material`.
 */
class MaterialSearch extends Material
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['num', 'name', 'pdf', 'ppt', 'swf'], 'safe'],
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
        $query = Material::find();

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

        $query->andFilterWhere(['like', 'num', $this->num])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'pdf', $this->pdf])
            ->andFilterWhere(['like', 'ppt', $this->ppt])
            ->andFilterWhere(['like', 'swf', $this->swf]);

        return $dataProvider;
    }
}
