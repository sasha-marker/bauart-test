<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@common' => dirname(__DIR__),
        '@frontend' =>  dirname(dirname(__DIR__)) . '/frontend',
        '@backend' =>  dirname(dirname(__DIR__)) . '/backend',
        '@console' =>  dirname(dirname(__DIR__)) . '/console',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],
];
