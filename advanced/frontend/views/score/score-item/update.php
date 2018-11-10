<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\score\ScoreItem */

$this->title = 'Update Score Item: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Score Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="score-item-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
