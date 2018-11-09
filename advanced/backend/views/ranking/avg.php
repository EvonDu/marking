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
                        <th>平均得分</th>
                    </tr>
                    <?php $i = 1;?>
                    <?php foreach($list as $item):?>
                        <tr>
                            <th style="width: 10px"><?=$i++?></th>
                            <th style="width: 30%"><?=$item["num"]?></th>
                            <th><?=$item["avg"]?></th>
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