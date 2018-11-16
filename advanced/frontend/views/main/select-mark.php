<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\score\ScoreItem */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
</style>

<div class="main-form">
    <?php foreach($list as $item):?>
        <a type="button" class="btn btn-success btn-lg btn-block" href="<?=\yii\helpers\Url::to(["mark","num"=>$item])?>"><?=$item?></a>
    <?php endforeach;?>
</div>