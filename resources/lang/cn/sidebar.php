<?php

return [
    'module' =>
    [
        [
            'title' => '管理文章组 ',
            'icon' => 'fa fa-file',
            'name' => ['post'],
            'subModule' =>
            [
                [
                    'title' => '管理文章组 ',
                    'route' => 'post/catalogue/index',
                ],
                [
                    'title' => '文章管理 ',
                    'route' => 'post/index',
                ],
            ],
        ],

        [
            'title' => ' 管理帐户组 ',
            'icon' => 'fa fa-user',
            'name' => ['user','permission'],
            'subModule' =>
            [
                [
                    'title' => '管理帐户组 ',
                    'route' => 'user/catalogue/index',
                ],
                [
                    'title' => ' 帐户管理 ',
                    'route' => 'user/index',
                ],
                [
                    'title' => '允许',
                    'route' => 'permission/index',
                ],
            ],
        ],

        [
            'title' => '通用配置 ',
            'icon' => 'fa fa-cog',
            'name' => ['language'],
            'subModule' =>
            [
                [
                    'title' => '语言管理 ',
                    'route' => 'language/index',
                ],
            ],
        ],
    ],
];
