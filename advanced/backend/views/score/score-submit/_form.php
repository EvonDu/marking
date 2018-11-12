<?php

use yii\helpers\Html;
use vuelte\widgets\ActiveElementForm;

/* @var $this yii\web\View */
/* @var $model common\models\score\ScoreSubmit */
/* @var $form yii\widgets\ActiveForm */
?>
<component-template>
    <div class="score-submit-form">

        <?php ActiveElementForm::begin(["options"=>[
            "label-width" => "100px",
            "status-icon" => true,
        ]]); ?>

        <el-form-item prop="user_id"
                      label="<?= ActiveElementForm::getFieldLabel($model,"user_id")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"user_id")?>">
            <el-input v-model="data.user_id"></el-input>
        </el-form-item> 

        <el-form-item prop="num"
                      label="<?= ActiveElementForm::getFieldLabel($model,"num")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"num")?>">
            <el-input v-model="data.num"></el-input>
        </el-form-item>

        <el-form-item prop="fund"
                      label="<?= ActiveElementForm::getFieldLabel($model,"fund")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"fund")?>">
            <el-input v-model="data.fund"></el-input>
        </el-form-item>

        <el-form-item prop="s1"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s1")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s1")?>">
            <el-input v-model="data.s1"></el-input>
        </el-form-item> 

        <el-form-item prop="s2"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s2")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s2")?>">
            <el-input v-model="data.s2"></el-input>
        </el-form-item> 

        <el-form-item prop="s3"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s3")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s3")?>">
            <el-input v-model="data.s3"></el-input>
        </el-form-item> 

        <el-form-item prop="s4"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s4")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s4")?>">
            <el-input v-model="data.s4"></el-input>
        </el-form-item> 

        <el-form-item prop="s5"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s5")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s5")?>">
            <el-input v-model="data.s5"></el-input>
        </el-form-item> 

        <el-form-item prop="s6"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s6")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s6")?>">
            <el-input v-model="data.s6"></el-input>
        </el-form-item> 

        <el-form-item prop="s7"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s7")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s7")?>">
            <el-input v-model="data.s7"></el-input>
        </el-form-item> 

        <el-form-item prop="s8"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s8")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s8")?>">
            <el-input v-model="data.s8"></el-input>
        </el-form-item> 

        <el-form-item prop="s9"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s9")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s9")?>">
            <el-input v-model="data.s9"></el-input>
        </el-form-item> 

        <el-form-item prop="s10"
                      label="<?= ActiveElementForm::getFieldLabel($model,"s10")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"s10")?>">
            <el-input v-model="data.s10"></el-input>
        </el-form-item> 

        <el-form-item>
            <lte-btn type="info" @click="submit"><i class="glyphicon glyphicon-floppy-disk"></i> 保存</lte-btn>
        </el-form-item>

        <?php ActiveElementForm::end(); ?>

    </div>
</component-template>

<script>
    Vue.component('model-form', {
        template: '{{component-template}}',
        props:{
            data:{ type: Object, default: function(){ return {}; }}
        },
        methods: {
            submit: function (event) {
                YiiFormSubmit(this.data, "ScoreSubmit");
            }
        }
    });
</script>


