<?php

declare(strict_types=1);

return [
    'yii-extension/user-mailer-service' => [
        'applicationName' => 'module user',
        'emailFrom' => 'administrator@example.com',

        // config layouts email
        'confirmLayout' => ['html' => 'confirmation', 'text' => 'text/confirmation'],
        'recoveryLayout' => ['html' => 'recovery', 'text' => 'text/recovery'],
        'welcomeLayout' =>  ['html' => 'welcome', 'text' => 'text/welcome'],

        // config subject email
        'confirmationSubject' => '',
        'newPasswordSubject' => '',
        'reconfirmationSubject' => '',
        'recoverySubject' => '',
        'welcomeSubject' => '',
    ],

    'yiisoft/aliases' => [
        'aliases' => [
            '@user-view-mailer' =>  dirname(__DIR__) . '/storage/mail',
        ]
    ],

    'yiisoft/mailer' => [
        'composer' => [
            'composerView' => '@user-view-mailer',
        ],
    ],
];
