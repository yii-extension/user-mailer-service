<?php

declare(strict_types=1);

use Yii\Extension\User\Service\MailerUser;
use Yiisoft\Aliases\Aliases;

/** @var array $params */

return [
    MailerUser::class => [
        '__class' => MailerUser::class,
        'applicationName()' => [$params['yii-extension/user-mailer-service']['applicationName']],
        'emailFrom()' => [$params['yii-extension/user-mailer-service']['emailFrom']],
        'confirmLayout()' => [$params['yii-extension/user-mailer-service']['confirmLayout']],
        'reconfirmationLayout()' => [$params['yii-extension/user-mailer-service']['reconfirmationLayout']],
        'recoveryLayout()' => [$params['yii-extension/user-mailer-service']['recoveryLayout']],
        'welcomeLayout()' => [$params['yii-extension/user-mailer-service']['welcomeLayout']],
        'confirmationSubject()' => [$params['yii-extension/user-mailer-service']['confirmationSubject']],
        'newPasswordSubject()' => [$params['yii-extension/user-mailer-service']['newPasswordSubject']],
        'reconfirmationSubject()' => [$params['yii-extension/user-mailer-service']['reconfirmationSubject']],
        'recoverySubject()' => [$params['yii-extension/user-mailer-service']['recoverySubject']],
        'viewPath()' =>  [
            fn (Aliases $aliases) => $aliases->get(
                $params['yii-extension/user-mailer-service']['viewPath']
            )
        ],
        'welcomeSubject()' => [$params['yii-extension/user-mailer-service']['welcomeSubject']],
    ]
];
