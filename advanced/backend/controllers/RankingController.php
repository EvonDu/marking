<?php

namespace backend\controllers;

use common\lib\Upload;
use common\models\score\ScoreInvest;
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

    public function actionDescription(){
        $list = ScoreSubmit::rankDescription();
        return $this->render('description',[
            'list'=>$list
        ]);
    }

    public function actionFund(){
        $list = ScoreInvest::rankSum();
        return $this->render('fund',[
            'list'=>$list
        ]);
    }
}
