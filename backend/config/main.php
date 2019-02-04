<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php',
    require __DIR__ . '/hostinfo.php'
);

$backendRoutes = require(\Yii::getAlias('@backend') . '/config/routes.php');

return [
    'id' => 'app-backend',
    'language' => 'ru',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => [
      'log',
      'railwayCarriage'
    ],
    'modules' => [
      'railwayCarriage' => [
          'class' => 'backend\modules\railwayCarriage\Module',
      ],
    ],
    'components' => [
        'assetManager' => [
            'appendTimestamp' => true,
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'sourcePath' => null,
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'js' => [
                        'plugins/jquery/jquery.min.js',
                    ]
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'hostInfo' => (isset($params['hostInfo'])) ? $params['hostInfo'] : null,
            'class' => 'yii\web\UrlManager',
            'rules' => $backendRoutes,
        ],

    ],
    'params' => $params,
];
