<?php

namespace common\models\material;

use Yii;

/**
 * This is the model class for table "material".
 *
 * @property int $id
 * @property string $num
 * @property string $name
 * @property string $pdf
 * @property string $ppt
 * @property string $swf
 */
class Material extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'material';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['num'], 'required'],
            [['num', 'name'], 'string', 'max' => 50],
            [['pdf', 'ppt', 'swf'], 'string', 'max' => 512],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'num' => '编号',
            'name' => '名称',
            'pdf' => 'PDF',
            'ppt' => 'PPT',
            'swf' => 'SWF',
        ];
    }
}
