<?php

declare(strict_types=1);

return [
    'yii-extension/user-mailer-service' => [
        // config main
        'moduleName' => 'Module Yii-Extension/User',
        'emailFrom' => 'administrator@example.com',
        'signatureImageEmail' => '@user-view-mailer/signature/yii-extension.jpg',
        'signatureTextEmail' => 'Flexible user registration and authentication module for Yii3.',
        'viewPath' => '@user-view-mailer',

        // config layouts email
        'confirmationLayout' => ['html' => 'confirmation', 'text' => 'text/confirmation'],
        'reconfirmationLayout' => ['html' => 'reconfirmation', 'text' => 'text/reconfirmation'],
        'recoveryLayout' => ['html' => 'recovery', 'text' => 'text/recovery'],
        'welcomeLayout' =>  ['html' => 'welcome', 'text' => 'text/welcome'],

        'confirmationSubject' => '',
        'newPasswordSubject' => '',
        'reconfirmationSubject' => '',
        'recoverySubject' => '',
        'welcomeSubject' => '',
    ],

    'yiisoft/aliases' => [
        'aliases' => [
            '@user-view-mailer' =>  '@vendor/yii-extension/storage/mail',
        ]
    ],
];
