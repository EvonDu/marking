<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vuelte\widgets\ActiveElementForm;

vuelte\lib\Import::value($this, $model, "data");
?>
<style>
    .main-content{
        max-width: 800px;
        margin: auto;
    }
    .el-form-item__content,.el-input-number{
        /*width: 100%;*/
        width: 600px;
    }
    #app{
        padding: 18px 0px;
    }
    iframe{
        width: 100%;
        height: 600px;
    }
</style>

<div class="main-content">
    <h1>参赛资料</h1>
    <iframe src="<?=$material->pdfUrl?>"></iframe>

    <h1>评分选项</h1>
    <div id="app">
        <?php ActiveElementForm::begin(["options"=>[
            "label-width" => "140px",
            "status-icon" => true,
        ]]); ?>

        <el-form-item prop="s1"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s1")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s1")?>">
            <el-input-number v-model="data.s1" :min="1" :max="10"></el-input-number>
        </el-form-item>

        <el-form-item prop="s2"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s2")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s2")?>">
            <el-input-number v-model="data.s2" :min="1" :max="10"></el-input-number>
        </el-form-item>

        <el-form-item prop="s3"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s3")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s3")?>">
            <el-input-number v-model="data.s3" :min="1" :max="10"></el-input-number>
        </el-form-item>

        <el-form-item prop="s4"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s4")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s4")?>">
            <el-input-number v-model="data.s4" :min="1" :max="10"></el-input-number>
        </el-form-item>

        <el-form-item prop="s5"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s5")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s5")?>">
            <el-input-number v-model="data.s5" :min="1" :max="10"></el-input-number>
        </el-form-item>

        <el-form-item prop="s6"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s6")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s6")?>">
            <el-input-number v-model="data.s6" :min="1" :max="10"></el-input-number>
        </el-form-item>

        <el-form-item prop="s7"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s7")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s7")?>">
            <el-input-number v-model="data.s7" :min="1" :max="10"></el-input-number>
        </el-form-item>

        <el-form-item prop="s8"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s8")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s8")?>">
            <el-input-number v-model="data.s8" :min="1" :max="8"></el-input-number>
        </el-form-item>

        <el-form-item prop="s9"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s9")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s9")?>">
            <el-input-number v-model="data.s9" :min="1" :max="8"></el-input-number>
        </el-form-item>

        <el-form-item prop="s10"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s10")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s10")?>">
            <el-input-number v-model="data.s10" :min="1" :max="9"></el-input-number>
        </el-form-item>

        <el-form-item>
            <lte-btn type="info" @click="submit"><i class="glyphicon glyphicon-cloud-up"></i> 提交评分</lte-btn>
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