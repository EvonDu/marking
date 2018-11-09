<?php

namespace common\models\score;

use Yii;

/**
 * This is the model class for table "score_item".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $max
 */
class ScoreItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'score_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['max'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['description'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '指标',
            'description' => '描述',
            'max' => '分数',
        ];
    }
}
