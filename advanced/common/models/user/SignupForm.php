<?php
namespace common\models\user;

use common\models\auth\AuthAssignment;
use Yii;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $fund;
    public $role;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\user\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\user\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['fund', 'number'],

            ['role', 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        //保存用户
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->fund = $this->fund;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if(!$user->save())
            return null;

        //添加角色
        if($this->role){
            $auth = new AuthAssignment();
            $auth->user_id = "$user->id";
            $auth->item_name = $this->role;
            $auth->created_at = time();
            $auth->save();
        }

        //返回
        return $user;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'email' => '邮箱',
            'password' => '密码',
            'fund' => '资金',
            'role' => '角色',
        ];
    }
}
