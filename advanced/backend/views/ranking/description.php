<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '平均得分排名';
$this->params['small'] = '';
?>
<div id="app">
    <lte-row>
        <lte-col>
            <lte-box title="排名结果" icon="glyphicon glyphicon-equalizer" no-padding>
                <table class="table table-hover">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 30%">队伍</th>
                        <th>平均总得分</th>
                        <th>价值贡献</th>
                        <th>技术描述</th>
                        <th>项目描述</th>
                        <th>方案可行性</th>
                        <th>行业规模</th>
                        <th>市场机会</th>
                        <th>营销策略</th>
                        <th>协同能力</th>
                        <th>PPT制作及演讲形式</th>
                        <th>现场展示</th>


                    </tr>
                    <?php $i = 1;?>
                    <?php foreach($list as $item):?>
                        <tr>
                            <th style="width: 10px"><?=$i++?></th>
                            <th style="width: 30%"><?=$item["num"]?></th>
                            <th><?=$item["avg"]?></th>
                            <th><?=$item["s1"]?></th>
                            <th><?=$item["s2"]?></th>
                            <th><?=$item["s3"]?></th>
                            <th><?=$item["s4"]?></th>
                            <th><?=$item["s5"]?></th>
                            <th><?=$item["s6"]?></th>
                            <th><?=$item["s7"]?></th>
                            <th><?=$item["s8"]?></th>
                            <th><?=$item["s9"]?></th>
                            <th><?=$item["s10"]?></th>
                        </tr>
                    <?php endforeach;?>
                </table>
            </lte-box>
        </lte-col>
    </lte-row>
</div>


<script>
    new Vue({
        el:'#app',
        data:{}
    });
</script>