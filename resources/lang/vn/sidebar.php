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
            'title' => 'Quản lý loại sản phẩm',
            'icon' => 'fa fa-archive',
            'name' => ['product','brand'],
            'subModule' =>
            [
                [
                    'title' => 'Quản lý loại sản phẩm',
                    'route' => 'product/catalogue/index',
                ],
                [
                    'title' => 'Quản lý sản phẩm',
                    'route' => 'product/index',
                ],
                [
                    'title' => 'Quản lý thương hiệu',
                    'route' => 'brand/index',
                ],
            ],
        ],
        [
            'title' => 'Quản lý đơn hàng',
            'icon' => 'fa fa-shopping-cart',
            'name' => ['order'],
            'subModule' =>
            [
                [
                    'title' => 'Quản lý đơn hàng',
                    'route' => 'order/index',
                ],
            ],
        ],

        [
            'title' => 'Qlý nhóm tài khoản',
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
