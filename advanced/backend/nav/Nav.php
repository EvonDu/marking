<?php
namespace backend\nav;

use yii\helpers\Url;

class Nav
{
    static function getNav()
    {
        $menuItems = array(
            array(
                'title' => '功能列表',
                'header' => true
            ),
            array(
                'url' => Url::to(['site/home']),
                'title' => "仪表盘",
                'icon' => 'fa fa-dashboard',
                'auth' => '',
            ),
            array(
                'url' => '#',
                'title' => "用户管理",
                'icon' => 'fa fa-users',
                'auth' => '',
                'tags' => array(array('content' => 'system','class'=>'bg-teal'),),
                'nodes' => array(
                    array('title' => "系统用户", 'url' => Url::to(['user/admin/index'])),
                    array('title' => "用户管理", 'url' => Url::to(['user/user/index'])),
                    array('title' => "角色管理", 'url' => Url::to(['user/role/index'])),
                    array('title' => "权限管理", 'url' => Url::to(['user/auth/index'])),
                )
            ),
            array(
                'url' => '#',
                'title' => "比赛资料",
                'icon' => 'fa fa-file-text-o',
                'auth' => '',
                'tags' => array(array('content' => 'system','class'=>'bg-teal'),),
                'nodes' => array(
                    array('title' => "资料管理", 'url' => Url::to(['material/material/index'])),
                )
            ),
            array(
                'url' => '#',
                'title' => "评分管理",
                'icon' => 'fa fa-check-square-o',
                'auth' => '',
                'tags' => array(array('content' => 'system','class'=>'bg-teal'),),
                'nodes' => array(
                    array('title' => "评分选项", 'url' => Url::to(['score/score-item/index'])),
                    array('title' => "评分提交", 'url' => Url::to(['score/score-submit/index'])),
                )
            ),
            array(
                'url' => '#',
                'title' => "评分排名",
                'icon' => 'fa fa-bar-chart',
                'auth' => '',
                'tags' => array(array('content' => 'system','class'=>'bg-teal'),),
                'nodes' => array(
                    array('title' => "总分排名", 'url' => Url::to(['ranking/sum'])),
                    array('title' => "均分排名", 'url' => Url::to(['ranking/avg'])),
                )
            ),
            //相关接口
            array(
                'title' => '系统接口',
                'header' => true
            ),
            array(
                'url' => '#',
                'title' => "接口文档",
                'icon' => 'fa fa-file-text-o',
                'auth' => '',
                'tags' => array(array('content' => 'swagger','class'=>'bg-green'),),
            ),
        );

        return $menuItems;
    }
}
?>