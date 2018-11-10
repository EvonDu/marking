<?php

namespace common\models\score;

use Yii;
use common\models\user\User;

/**
 * This is the model class for table "score_submit".
 *
 * @property int $id
 * @property int $user_id
 * @property string $num
 * @property int $s1
 * @property int $s2
 * @property int $s3
 * @property int $s4
 * @property int $s5
 * @property int $s6
 * @property int $s7
 * @property int $s8
 * @property int $s9
 * @property int $s10
 *
 * @property User $user
 */
class ScoreSubmit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'score_submit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'num'], 'required'],
            [['user_id', 's1', 's2', 's3', 's4', 's5', 's6', 's7', 's8', 's9', 's10'], 'integer'],
            [['num'], 'string', 'max' => 50],
            [['user_id', 'num'], 'unique', 'targetAttribute' => ['user_id', 'num']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '评委ID',
            'num' => '队伍编号',
            's1' => '价值贡献',
            's2' => '技术描述',
            's3' => '项目描述',
            's4' => '方案可行性',
            's5' => '行业规模',
            's6' => '市场机会',
            's7' => '营销策略',
            's8' => '协同能力',
            's9' => 'PPT制作及演讲形式',
            's10' => '现场展示',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * 合计得分排名
     * @return array
     */
    static public function rankSum(){
        //拼接语句
        $sql = "SELECT num,SUM(s1+s2+s3+s4+s5+s6+s7+s8+s9+s10) as sum";
        $sql .= " FROM ".self::tableName();
        $sql .= " group by num";
        $sql .= " order by sum desc";

        //返回结果
        $command = Yii::$app->db->createCommand($sql);
        $list = $command->queryAll();
        return $list;
    }

    /**
     * 平均得分排名
     * @return array
     */
    static public function rankAvg(){
        //拼接语句
        $sql = "SELECT num,AVG(s1+s2+s3+s4+s5+s6+s7+s8+s9+s10) as avg";
        $sql .= " FROM ".self::tableName();
        $sql .= " group by num";
        $sql .= " order by avg desc";

        //返回结果
        $command = Yii::$app->db->createCommand($sql);
        $list = $command->queryAll();
        return $list;
    }

    static public function rankDescription(){
        //拼接语句
        $sql = "SELECT num,AVG(s1+s2+s3+s4+s5+s6+s7+s8+s9+s10) as avg";
        for($i=1;$i<=10;$i++)
            $sql .= ",AVG(s$i) as s$i";
        $sql .= " FROM ".self::tableName();
        $sql .= " group by num";
        $sql .= " order by avg desc";

        //返回结果
        $command = Yii::$app->db->createCommand($sql);
        $list = $command->queryAll();
        return $list;
    }
}
