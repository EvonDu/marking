<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vuelte\widgets\ActiveElementForm;

/* @var $this yii\web\View */
/* @var $model common\models\material\MaterialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="material-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'num') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'pdf') ?>

    <?= $form->field($model, 'ppt') ?>

    <?php // echo $form->field($model, 'swf') ?>

    <div class="form-group">
        <?= Html::tag("lte-btn","<i class='glyphicon glyphicon-search'></i> 搜索",["type" => "info", "submit" => true]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

