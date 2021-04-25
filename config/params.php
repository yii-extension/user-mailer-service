<?php

declare(strict_types=1);

return [
    'yii-extension/user-mailer-service' => [
        // config main
        'moduleName' => 'Module Yii-Extension/User',
        'emailFrom' => 'administrator@example.com',
        'signatureImageEmail' => '@user-view-mailer/storage/signature/yii-extension.jpg',
        'signatureTextEmail' => 'Flexible user registration and authentication module for Yii3.',
        'viewPath' => '@user-view-mailer',

        // config layouts email
        'confirmationLayout' => ['html' => 'storage/confirmation', 'text' => 'storage/text/confirmation'],
        'reconfirmationLayout' => ['html' => 'storage/reconfirmation', 'text' => 'storage/text/reconfirmation'],
        'recoveryLayout' => ['html' => 'storage/recovery', 'text' => 'storage/text/recovery'],
        'welcomeLayout' =>  ['html' => 'storage/welcome', 'text' => 'storage/text/welcome'],

        'confirmationSubject' => '',
        'newPasswordSubject' => '',
        'reconfirmationSubject' => '',
        'recoverySubject' => '',
        'welcomeSubject' => '',
    ],

    'yiisoft/aliases' => [
        'aliases' => [
            '@user-view-mailer' =>  '@vendor/yii-extension/user-mailer-service',
        ]
    ],
];
