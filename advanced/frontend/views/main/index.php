<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\score\ScoreItem */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .content{
        margin-top: 10%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .field-selectform-num{
        min-width: 250px;
    }
</style>

<div class="main-form">

    <?php $form = ActiveForm::begin([
        //'options' => ['class' => 'form form-horizontal'],
    ]); ?>

    <?= $form->field($model, 'num',['template'=>'
        <div class="input-group">
        {input}
        <span class="input-group-btn">
            '.Html::submitButton("开始评分", ["class" => "btn btn-success"]).'
        </span></div>{error}'
    ])->textInput() ?>

    <?php ActiveForm::end(); ?>

</div>