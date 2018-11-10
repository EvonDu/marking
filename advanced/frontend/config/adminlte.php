<?php
use \yii\helpers\Url;

return [
    //配置名称
    'productName' => 'Yii AdminLet',
    //配置用户
    'user' => [
        'name'=> isset(Yii::$app->user->identity->info->nickname) ? Yii::$app->user->identity->info->nickname : null,
        'image'=> isset(Yii::$app->user->identity->info->avatarUrl) ? Yii::$app->user->identity->info->avatarUrl : null,
        'job'=> "Developer",
        'abstract'=> 'Member since Nov. 2012',
    ],
    //用户按钮
    'userButtons' => [
        ['text' => '用户信息', 'url' => '#'],
        ['text' => '修改密码', 'url' => '#'],
        ['text' => '我的收藏', 'url' => '#'],
    ],
    //配置简介
    'profile' => ['text' => '设置', 'url' => '#'],
    //配置登出
    'signout' => ['text' => '退出', 'url' => Url::to(['site/logout'],true)],
    //配置导航
    'nav' => [
        [ "title"=>"Gii", "header" => true ],
        [
            "url" => "#",
            "title" =>"Yii Code Generator",
            "icon" => "fa fa-dashboard",
            "active" => true,
            "tags" => [["content"=>"Yii", "class"=>"bg-green"]],
            "nodes" => [
                ["title" => "Model Generator", "url" => Url::to(["/gii/default/view","id"=>"model"])],
                ["title" => "CRUD Generator", "url" => Url::to(["/gii/default/view","id"=>"crud"])],
                ["title" => "Module Generator", "url" => Url::to(["/gii/default/view","id"=>"module"])],
            ]
        ]
    ],
    //配置信息
    'messages' => [],
    //配置通知
    'notifications' => [],
    //配置任务
    'tasks' => [],
    //配置页脚
    'footer' => '<strong>Copyright &copy; 2017-2018 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights reserved.',
];
?>