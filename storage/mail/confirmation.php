<?php

declare(strict_types=1);

use Yiisoft\Html\Html;
use Yiisoft\Translator\TranslatorInterface;

/**
 * @var string $applicationName
 * @var array $params
 * @var TranslatorInterface $translator
 */
?>
<p class = 'mail-confirmation'>
    <?= $translator->translate('Hello, {username},', ['username' => $params['username']], 'user-mailer') ?>
</p>

<p class = 'mail-confirmation'>
    <?= $translator->translate(
        'Thank you for signing up on {applicationName}.',
        ['applicationName' => $applicationName],
        'user-mailer'
    ) ?>
    <?= $translator->translate('In order to complete your request, please click the link below:', [], 'user-mailer') ?>
</p>

<p class = 'mail-confirmation'>
    <strong><?= Html::a(Html::encode($params['url']), $params['url']) ?></strong>
</p>

<p class = 'mail-confirmation'>
    <?= $translator->translate('If you cannot click the link, please try pasting the text into your browser.', [], 'user-mailer') ?>
    <?= $translator->translate('If you did not make this request you can ignore this email.', [], 'user-mailer') ?>
</p>