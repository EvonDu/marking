<?php
namespace frontend\controllers;

use common\models\material\Material;
use common\models\score\ScoreSubmit;
use frontend\models\SelectForm;
use Yii;
use yii\base\InvalidParamException;
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
        $model = new SelectForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->redirect(['mark', 'num' => $model->num]);
        }

        return $this->render('index', [
            'model' => $model,
        ]);
    }

    /**
     * @param $num
     * @return string|\yii\web\Response
     */
    public function actionMark($num){
        $model = new ScoreSubmit();
        $model->num = $num;
        $model->user_id = Yii::$app->user->identity->getId();

        $material = Material::findOne(["num"=>$num]);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('mark', [
            'model' => $model,
            'material' => $material
        ]);
    }
}
