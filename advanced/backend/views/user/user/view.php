<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\admin\Admin */

$this->title = $model->info->nickname;
$this->params['small'] = 'View';
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="app">
    <lte-row>
        <lte-col col="3">
            <lte-box title="选项" icon="fa fa-edit">
                <?= Html::tag("lte-btn","<i class='glyphicon glyphicon-list'></i> 列表",[
                    "href"=>Url::to(["index"]),
                    "a"=>true,
                    "block"=>true,
                ])?>
                <?= Html::tag("lte-btn","<i class='glyphicon glyphicon-plus'></i> 添加",[
                    "href"=>Url::to(["signup"]),
                    "a"=>true,
                    "block"=>true,
                    "type"=>"info"
                ])?>
                <?= Html::tag("lte-btn","<i class='glyphicon glyphicon-edit'></i> 修改",[
                    "href"=>Url::to(["info", 'id' => $model->id]),
                    "a"=>true,
                    "block"=>true,
                    "type"=>"success"
                ])?>
                <?= Html::tag("lte-btn","<i class='glyphicon glyphicon-remove'></i> 删除",[
                    "href"=>Url::to(["delete", 'id' => $model->id]),
                    "a"=>true,
                    "block"=>true,
                    "type"=>"danger",
                    'data' => [
                    'confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ]
                ])?>
                <?= Html::tag("lte-btn","<i class='glyphicon glyphicon-share-alt'></i> 返回",[
                    "href"=>"javascript:history.go(-1)",
                    "a"=>true,
                    "block"=>true,
                    "type"=>"warning"
                ])?>
            </lte-box>
        </lte-col>
        <lte-col col="9">
            <lte-box title="详情" icon="fa fa-eye">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        [
                            'attribute'=>'info.avatar',
                            'format' => 'raw',
                            'value' => function($model){
                                return isset($model->info->avatarUrl)? Html::img($model->info->avatarUrl,['style'=>'width: 100px;']):null;
                            }
                        ],
                        'username',
                        'info.nickname',
                        'info.phone',
                        'auth_key',
                        //'password_hash',
                        //'password_reset_token',
                        'email:email',
                        'status',
                        'created_at:datetime',
                        'updated_at:datetime',
                    ],
                ]) ?>

            </lte-box>
        </lte-col>
    </lte-row>
</div>

<script>
    new Vue({
        el:'#app',
        data:{}
    })
</script>