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
                <tr><td>指标</td><td>详细指标</td><td>详细描述</td><td>分值</td><td>评分</td></tr>
            </thead>
            <tbody>
            <tr>
                <td rowspan="4">方案描述及可行性（45分）</td>
                <td>价值贡献</td>
                <td>对公司主营业务的是否有贡献价值，或对公司数字化转型能够提供支持</td>
                <td>10</td>
                <td>
                    <el-form-item prop="s1"
                                  error="<?= ActiveElementForm::getFieldError($model,"s1")?>">
                        <el-input-number v-model="data.s1" :min="0" :max="10"></el-input-number>
                    </el-form-item>
                </td>
            </tr>
            <tr>
                <td>技术描述</td>
                <td>技术是否成熟、新颖，描述是否条理清晰，“数字化”技术应用情况</td>
                <td>10</td>
                <td>
                    <el-form-item prop="s2"
                                  error="<?= ActiveElementForm::getFieldError($model,"s2")?>">
                        <el-input-number v-model="data.s2" :min="0" :max="10"></el-input-number>
                    </el-form-item>
                </td>
            </tr>
            <tr>
                <td>项目描述</td>
                <td>准确定义所提供的产品、技术、概念产品，针对解决的问题，如何满足市场需求，项目所具有的独创性、领先型。</td>
                <td>10</td>
                <td>
                    <el-form-item prop="s3"
                                  error="<?= ActiveElementForm::getFieldError($model,"s3")?>">
                        <el-input-number v-model="data.s3" :min="0" :max="10"></el-input-number>
                    </el-form-item>
                </td>
            </tr>
            <tr>
                <td>方案可行性</td>
                <td>业务主旨、资金筹备方案合理性、管理背景和能力产品、服务、技术含量和创新型</td>
                <td>15</td>
                <td>
                    <el-form-item prop="s4"
                                  error="<?= ActiveElementForm::getFieldError($model,"s4")?>">
                        <el-input-number v-model="data.s4" :min="0" :max="15"></el-input-number>
                    </el-form-item>
                </td>
            </tr>
            <tr>
                <td rowspan="3">市场前景及效益（30分）</td>
                <td>行业规模</td>
                <td>描述行业的整体发展情况、细分市场情况、市场动态以及客户规模。</td>
                <td>10</td>
                <td>
                    <el-form-item prop="s5"
                                  error="<?= ActiveElementForm::getFieldError($model,"s5")?>">
                        <el-input-number v-model="data.s5" :min="0" :max="10"></el-input-number>
                    </el-form-item>
                </td>
            </tr>
            <tr>
                <td>市场机会</td>
                <td>详细的市场调查，分析面对的市场状况、发展趋势、竞争状况、市场定位。清晰的产业和市场竞争环境，市场机会和有效的市场需求</td>
                <td>10</td>
                <td>
                    <el-form-item prop="s6"
                                  error="<?= ActiveElementForm::getFieldError($model,"s6")?>">
                        <el-input-number v-model="data.s6" :min="0" :max="10"></el-input-number>
                    </el-form-item>
                </td>
            </tr>
            <tr>
                <td>营销策略</td>
                <td>根据项目的特点，制定合适的市场营销策略，包括营销渠道，促销方式，产品的生产、服务计划，经营难度，资源需求</td>
                <td>10</td>
                <td>
                    <el-form-item prop="s7"
                                  error="<?= ActiveElementForm::getFieldError($model,"s7")?>">
                        <el-input-number v-model="data.s7" :min="0" :max="10"></el-input-number>
                    </el-form-item>
                </td>
            </tr>
            <tr>
                <td rowspan="3">现场展示（25分）</td>
                <td>协同能力</td>
                <td>充分展示出内外部协同能力，资源整合能力和创业团队的能力建设与提升</td>
                <td>8</td>
                <td>
                    <el-form-item prop="s8"
                                  error="<?= ActiveElementForm::getFieldError($model,"s8")?>">
                        <el-input-number v-model="data.s8" :min="0" :max="8"></el-input-number>
                    </el-form-item>
                </td>
            </tr>
            <tr>
                <td>PPT制作及演讲形式</td>
                <td>PPT制作结构严谨、构思巧妙、一目了然，能够达到更有效的沟通；演讲形式新颖，产品展示生动形象</td>
                <td>8</td>
                <td>
                    <el-form-item prop="s9"
                                  error="<?= ActiveElementForm::getFieldError($model,"s9")?>">
                        <el-input-number v-model="data.s9" :min="0" :max="8"></el-input-number>
                    </el-form-item>
                </td>
            </tr>
            <tr>
                <td>现场展示</td>
                <td>演讲者预言规范、语速恰当、表达清楚、流畅，具有较强的感染力。营造良好的演讲效果演讲时间控释在9分钟之内</td>
                <td>9</td>
                <td>
                    <el-form-item prop="s10"
                                  error="<?= ActiveElementForm::getFieldError($model,"s10")?>">
                        <el-input-number v-model="data.s10" :min="0" :max="9"></el-input-number>
                    </el-form-item>
                </td>
            </tr>
            <tr>
                <td colspan="4">项目总分</td>
                <td colspan="1">
                    {{data.s1+data.s2+data.s3+data.s4+data.s5+data.s6+data.s7+data.s8+data.s9+data.s10}}
                </td>
            </tr>
            </tbody>
        </table>

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