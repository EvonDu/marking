<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vuelte\widgets\ActiveElementForm;

vuelte\lib\Import::value($this, $model, "data");
?>
<style>
    .main-content{
        max-width: 1080px;
        margin: auto;
    }
    #app{
        padding: 18px 0px;
    }
    .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td{
        border: 1px solid black !important;
        text-align: center;
        vertical-align: middle;
    }
    .material{
        font-size: 24px;
    }
</style>

<div class="main-content">
    <div id="app">
        <?php ActiveElementForm::begin(["options"=>[
            "status-icon" => true,
        ]]); ?>

        <div class="material">序号：<?=$material->id?>&nbsp;&nbsp;&nbsp;&nbsp;队伍：<?=$material->num?></div>
        <table class="table table-bordered">
            <thead>
            <tr><td>剩余资金</td><td>投资金额</td></tr>
            </thead>
            <tbody>
            <tr>
                <td>剩余资金: <?=Yii::$app->user->identity->fund?></td>
                <td>
                    <el-form-item prop="fund"
                                  error="<?= ActiveElementForm::getFieldError($model,"fund")?>">
                        <el-input-number v-model="data.fund" :min="0" :max="<?=Yii::$app->user->identity->fund?>"></el-input-number>
                    </el-form-item>
                </td>
            </tr>
            </tbody>
        </table>

        <el-form-item>
            <lte-btn type="info" @click="submit"><i class="glyphicon glyphicon-cloud-up"></i> 提交投资</lte-btn>
        </el-form-item>

        <?php ActiveElementForm::end(); ?>
    </div>

</div>

<script>
    new Vue({
        el:'#app',
        data:{
            data:data,
        },
        methods:{
            submit:function(event){
                YiiFormSubmit(this.data,"<?= $model->formName()?>");
            },
        }
    })
</script>