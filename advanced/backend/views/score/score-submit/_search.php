<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vuelte\widgets\ActiveElementForm;

/* @var $this yii\web\View */
/* @var $model common\models\score\ScoreSubmitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="score-submit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'user_id') ?>

    <?= $form->field($model, 'num') ?>

    <?= $form->field($model, 's1') ?>

    <?= $form->field($model, 's2') ?>

    <?php // echo $form->field($model, 's3') ?>

    <?php // echo $form->field($model, 's4') ?>

    <?php // echo $form->field($model, 's5') ?>

    <?php // echo $form->field($model, 's6') ?>

    <?php // echo $form->field($model, 's7') ?>

    <?php // echo $form->field($model, 's8') ?>

    <?php // echo $form->field($model, 's9') ?>

    <?php // echo $form->field($model, 's10') ?>

    <div class="form-group">
        <?= Html::tag("lte-btn","<i class='glyphicon glyphicon-search'></i> 搜索",["type" => "info", "submit" => true]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

