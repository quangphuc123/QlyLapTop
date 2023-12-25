<?php

return [
    'module' =>
    [
        [
            'title' => 'Quản lý nhóm bài viết',
            'icon' => 'fa fa-file',
            'name' => ['post'],
            'subModule' =>
            [
                [
                    'title' => 'Quản lý nhóm bài viết',
                    'route' => 'post/catalogue/index',
                ],
                [
                    'title' => 'Quản lý bài viết',
                    'route' => 'post/index',
                ],
            ],
        ],

        [
            'title' => 'Quản lý nhóm tài khoản',
            'icon' => 'fa fa-user',
            'name' => ['user','permission'],
            'subModule' =>
            [
                [
                    'title' => 'Quản lý nhóm tài khoản',
                    'route' => 'user/catalogue/index',
                ],
                [
                    'title' => 'Quản lý tài khoản',
                    'route' => 'user/index',
                ],
                [
                    'title' => 'Quản lý quyền',
                    'route' => 'permission/index',
                ],
            ],
        ],

        [
            'title' => 'Cấu hình chung',
            'icon' => 'fa fa-cog',
            'name' => ['language'],
            'subModule' =>
            [
                [
                    'title' => 'Quản lý ngôn ngữ ',
                    'route' => 'language/index',
                ],
            ],
        ],
    ],
];
