<?php

namespace frontend\models;

use common\models\material\Material;
use common\models\score\ScoreSubmit;
use Yii;
use yii\base\Model;

/**
 * This is the model class for table "SelectForm".
 *
 * @property string $num
 */
class SelectForm extends Model
{
    public $num;

    /**
     * @return array
     */
    public function rules()
    {
        return [
            [['num'], 'required'],
            [['num'], 'ruleAccess','params'=>[]],
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'num' => '队伍',
        ];
    }

    public function ruleAccess($attribute, $params)
    {
        //查看队伍是否有效
        $material = Material::findOne(["num"=>$this->$attribute]);
        if(!$material)
            return $this->addError($attribute, "该队伍没有提交相关比赛资料.");

        //查看是否已经进行过评分
        $submit = ScoreSubmit::findOne(["num"=>$this->$attribute,"user_id"=>Yii::$app->user->identity->getId()]);
        if($submit)
            return $this->addError($attribute, "已进行过评分.");

        return true;
    }
}
