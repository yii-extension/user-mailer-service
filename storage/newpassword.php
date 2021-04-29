<?php

declare(strict_types=1);

use Yiisoft\Translator\TranslatorInterface;

/**
 * @var string $moduleName
 * @var array $params
 * @var TranslatorInterface $translator
 */
?>
<p class = 'mail-new_password'>
    <?= $translator->translate('Hello, {username},', ['username' => $params['username']], 'user-mailer') ?>
</p>

<p class = 'mail-new_password'>
    <?= $translator->translate(
        'Your account on {moduleName} has a new password.',
        ['moduleName' => $moduleName],
        'user-mailer',
    ) ?>
    <strong><?= $params['password'] ?></strong>
</p>

<p class = 'mail-new_password'>
    <?= $translator->translate('We have generated a password for you:', [], 'user-mailer') ?>
</p>
