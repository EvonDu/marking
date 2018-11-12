<?php

use yii\helpers\Html;
use vuelte\widgets\ActiveElementForm;

vuelte\lib\Import::component($this,'@app/views/components/upload-file');

/* @var $this yii\web\View */
/* @var $model common\models\material\Material */
/* @var $form yii\widgets\ActiveForm */
?>
<component-template>
    <div class="material-form">

        <?php ActiveElementForm::begin(["options"=>[
            "label-width" => "100px",
            "status-icon" => true,
        ]]); ?>

        <el-form-item prop="num"
                      label="<?= ActiveElementForm::getFieldLabel($model,"num")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"num")?>">
            <el-input v-model="data.num"></el-input>
        </el-form-item> 

        <!--<el-form-item prop="name"
                      label="<?/*= ActiveElementForm::getFieldLabel($model,"name")*/?>"
                      error="<?/*= ActiveElementForm::getFieldError($model,"name")*/?>">
            <el-input v-model="data.name"></el-input>
        </el-form-item> -->

        <el-form-item prop="pdf"
                      label="<?= ActiveElementForm::getFieldLabel($model,"pdf")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"pdf")?>">
            <upload-file v-model="data.pdf" path="video"></upload-file>
        </el-form-item> 

        <el-form-item prop="ppt"
                      label="<?= ActiveElementForm::getFieldLabel($model,"ppt")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"ppt")?>">
            <upload-file v-model="data.ppt" path="video"></upload-file>
        </el-form-item> 

        <el-form-item prop="swf"
                      label="<?= ActiveElementForm::getFieldLabel($model,"swf")?>"
                      error="<?= ActiveElementForm::getFieldError($model,"swf")?>">
            <upload-file v-model="data.swf" path="video"></upload-file>
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
                YiiFormSubmit(this.data, "Material");
            }
        }
    });
</script>


