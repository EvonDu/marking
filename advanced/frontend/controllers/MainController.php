<?php
namespace frontend\controllers;

use common\models\material\Material;
use common\models\score\ScoreSubmit;
use frontend\models\SelectForm;
use Yii;
use yii\base\InvalidParamException;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\user\LoginForm;
use common\models\user\PasswordResetRequestForm;
use common\models\user\ResetPasswordForm;
use common\models\user\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class MainController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'mark'],
                    'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        //获取已评分列表
        $list_ed = ScoreSubmit::getSubmitList(Yii::$app->user->identity->getId());
        $list_ed = ArrayHelper::getColumn($list_ed,"num");

        //获取全列表
        $list_all = Material::find()->all();
        $list_all = ArrayHelper::getColumn($list_all,"num");

        //获取列表
        $list = array_diff($list_all,$list_ed);

        //调用视图
        return $this->render('index', [
            'list' => $list,
        ]);
    }

    /**
     * @param $num
     * @return string|\yii\web\Response
     */
    public function actionMark($num){
        //查询是否已经评论过
        $submit = ScoreSubmit::findOne(["num"=>$num,"user_id"=>Yii::$app->user->identity->getId()]);
        if($submit)
            return $this->redirect(['index']);

        //定义初始值
        $model = new ScoreSubmit();
        $model->num = $num;
        $model->user_id = Yii::$app->user->identity->getId();
        $model->fund = 0;
        $model->s1 = 10;
        $model->s1 = 10;
        $model->s2 = 10;
        $model->s3 = 10;
        $model->s4 = 15;
        $model->s5 = 10;
        $model->s6 = 10;
        $model->s7 = 10;
        $model->s8 = 8;
        $model->s9 = 8;
        $model->s10 = 9;

        //获取资料
        $material = Material::findOne(["num"=>$num]);

        //保存评分记录
        if ($model->load(Yii::$app->request->post()) && $model->submit(Yii::$app->user->identity->getId())) {
            return $this->redirect(['index']);
        }

        //调用视图
        return $this->render('mark', [
            'model' => $model,
            'material' => $material
        ]);
    }
}
