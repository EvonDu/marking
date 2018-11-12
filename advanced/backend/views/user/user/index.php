<?php

use yii\helpers\Url;
use yii\helpers\Html;
use vuelte\widgets\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\admin\AdminSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '用户管理';
$this->params['small'] = 'List';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id="app">
    <lte-row>
        <lte-col col="3">
            <lte-box title="选项" icon="fa fa-edit">
                <?= Html::tag("lte-btn","<i class='glyphicon glyphicon-plus'></i> 添加",[
                    "href"=>Url::to(["signup"]),
                    "a"=>true,
                    "block"=>true,
                    "type"=>"info"
                ])?>
                <?= Html::tag("lte-btn","<i class='glyphicon glyphicon-share-alt'></i> 返回",[
                    "href"=>"javascript:history.go(-1)",
                    "a"=>true,
                    "block"=>true,
                    "type"=>"warning"
                ])?>
            </lte-box>
            <lte-box title="搜索" icon="fa fa-search">
                <?= $this->render('_search', ['model' => $searchModel]); ?>
            </lte-box>
        </lte-col>
        <lte-col col="9">
            <lte-box title="列表" icon="fa fa-list">

                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'id',
                        'username',
                        'email:email',
                        'fund',
                        'status',
                        ['attribute' => 'created_at', 'value'=> function($model){return  date('Y-m-d H:i:s',$model->created_at);},],
                        ['attribute' => 'updated_at', 'value'=> function($model){return  date('Y-m-d H:i:s',$model->updated_at);},],

                        ['class' => 'vuelte\widgets\ActionColumn'],
                    ],
                ]); ?>

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
