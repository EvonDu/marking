<?php
namespace frontend\controllers;

use common\models\material\Material;
use common\models\score\ScoreInvest;
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
                        'actions' => ['logout', 'index', 'mark', 'invest', 'select-mark', 'select-invest'],
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
     * 角色路由入口
     *
     * @return mixed
     */
    public function actionIndex()
    {
        //获取用户角色
        $user_id = Yii::$app->user->identity->getId();
        $roles = Yii::$app->authManager->getRolesByUser($user_id);
        $map = ArrayHelper::map($roles,"name","description");

        //路由到各自处理功能
        if(in_array("投资组",$map)){
            return $this->redirect(['select-invest']);
        }else{
            return $this->redirect(['select-mark']);
        }
    }

    /**
     * 选择评分队伍
     * @return string
     */
    public function actionSelectMark(){
        //获取已评分列表
        $list_ed = ScoreSubmit::getSubmitList(Yii::$app->user->identity->getId());
        $list_ed = ArrayHelper::getColumn($list_ed,"num");

        //获取全列表
        $list_all = Material::find()->all();
        $list_all = ArrayHelper::getColumn($list_all,"num");

        //获取列表
        $list = array_diff($list_all,$list_ed);

        //调用视图
        return $this->render('select-mark', [
            'list' => $list,
        ]);
    }

    /**
     * 进行队伍评分
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
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        //调用视图
        return $this->render('mark', [
            'model' => $model,
            'material' => $material
        ]);
    }

    /**
     * 选择队伍投资
     * @return string
     */
    public function actionSelectInvest(){
        //获取已评分列表
        $list_ed = ScoreInvest::getInvestList(Yii::$app->user->identity->getId());
        $list_ed = ArrayHelper::getColumn($list_ed,"num");

        //获取全列表
        $list_all = Material::find()->all();
        $list_all = ArrayHelper::getColumn($list_all,"num");

        //获取列表
        $list = array_diff($list_all,$list_ed);

        //调用视图
        return $this->render('select-invest', [
            'list' => $list,
        ]);
    }

    /**
     * 进行队伍投资
     */
    public function actionInvest($num){
        //查询是否已经投资过
        $submit = ScoreInvest::findOne(["num"=>$num,"user_id"=>Yii::$app->user->identity->getId()]);
        if($submit)
            return $this->redirect(['index']);
        //定义初始值
        $model = new ScoreInvest();
        $model->num = $num;
        $model->user_id = Yii::$app->user->identity->getId();
        $model->fund = 0;

        //获取资料
        $material = Material::findOne(["num"=>$num]);

        //保存评分记录
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        //调用视图
        return $this->render('invest', [
            'model' => $model,
            'material' => $material
        ]);
    }
}
