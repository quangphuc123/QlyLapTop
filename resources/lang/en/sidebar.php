<?php

return [
    'module' =>
    [
        [
            'title' => 'Manage article groups',
            'icon' => 'fa fa-file',
            'name' => ['post'],
            'subModule' =>
            [
                [
                    'title' => 'Manage article groups',
                    'route' => 'post/catalogue/index',
                ],
                [
                    'title' => 'Article management',
                    'route' => 'post/index',
                ],
            ],
        ],

        [
            'title' => 'Manage account groups',
            'icon' => 'fa fa-user',
            'name' => ['user'],
            'subModule' =>
            [
                [
                    'title' => 'Manage account groups',
                    'route' => 'user/catalogue/index',
                ],
                [
                    'title' => 'Account Management',
                    'route' => 'user/index',
                ],
            ],
        ],

        [
            'title' => 'General configuration',
            'icon' => 'fa fa-cog',
            'name' => ['language'],
            'subModule' =>
            [
                [
                    'title' => 'Language management',
                    'route' => 'language/index',
                ],
            ],
        ],
    ],
];
