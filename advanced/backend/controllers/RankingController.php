<?php

namespace backend\controllers;

use common\lib\Upload;
use common\models\score\ScoreSubmit;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * Class UploadController
 * @package backend\controllers
 */
class RankingController extends Controller
{
    public function actionSum(){
        $list = ScoreSubmit::rankSum();
        return $this->render('sum',[
            'list'=>$list
        ]);
    }

    public function actionAvg(){
        $list = ScoreSubmit::rankAvg();
        return $this->render('avg',[
            'list'=>$list
        ]);
    }
}
