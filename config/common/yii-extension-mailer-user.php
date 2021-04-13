<?php

declare(strict_types=1);

use Yii\Extension\User\Service\MailerUser;
use Yiisoft\Aliases\Aliases;

/** @var array $params */

return [
    MailerUser::class => [
        'class' => MailerUser::class,
        'moduleName()' => [$params['yii-extension/user-mailer-service']['moduleName']],
        'emailFrom()' => [$params['yii-extension/user-mailer-service']['emailFrom']],
        'confirmationLayout()' => [$params['yii-extension/user-mailer-service']['confirmationLayout']],
        'confirmationSubject()' => [$params['yii-extension/user-mailer-service']['confirmationSubject']],
        'newPasswordSubject()' => [$params['yii-extension/user-mailer-service']['newPasswordSubject']],
        'reconfirmationLayout()' => [$params['yii-extension/user-mailer-service']['reconfirmationLayout']],
        'reconfirmationSubject()' => [$params['yii-extension/user-mailer-service']['reconfirmationSubject']],
        'recoveryLayout()' => [$params['yii-extension/user-mailer-service']['recoveryLayout']],
        'recoverySubject()' => [$params['yii-extension/user-mailer-service']['recoverySubject']],
        'signatureImageEmail()' => [
            fn (Aliases $aliases) => $aliases->get(
                $params['yii-extension/user-mailer-service']['signatureImageEmail']
            )
        ],
        'signatureTextEmail()' => [$params['yii-extension/user-mailer-service']['signatureTextEmail']],
        'welcomeLayout()' => [$params['yii-extension/user-mailer-service']['welcomeLayout']],
        'welcomeSubject()' => [$params['yii-extension/user-mailer-service']['welcomeSubject']],
        'viewPath()' =>  [
            fn (Aliases $aliases) => $aliases->get(
                $params['yii-extension/user-mailer-service']['viewPath']
            )
        ],
    ],
];
