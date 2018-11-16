<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = '合计投资排名';
$this->params['small'] = 'Sum';
?>
<div id="app">
    <lte-row>
        <lte-col>
            <lte-box title="排名结果" icon="glyphicon glyphicon-equalizer" no-padding>
                <table class="table table-hover">
                    <tr>
                        <th style="width: 10px">#</th>
                        <th style="width: 30%">队伍</th>
                        <th>获得投资</th>
                    </tr>
                    <?php $i = 1;?>
                    <?php foreach($list as $item):?>
                        <tr>
                            <th style="width: 10px"><?=$i++?></th>
                            <th style="width: 30%"><?=$item["num"]?></th>
                            <th><?=$item["sum"]?></th>
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