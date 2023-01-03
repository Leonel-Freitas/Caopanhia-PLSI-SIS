<?php
return [
    'id' => 'app-common-tests',
    'basePath' => dirname(__DIR__),
    'components' => [
        'user' => [
            'class' => \yii\web\User::class,
            'identityClass' => 'common\models\User',
        ],
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=BDcaopanhia_tests',
            'username' => 'root',
            'password' => ''
        ],
        'request' => [
            'cookieValidationKey' => 'Gu3WvTNYzmDuF_IbdN3A7vVavOdUOJmO',
        ]
    ],
];
