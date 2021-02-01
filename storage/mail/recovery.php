<?php

declare(strict_types=1);

use Yiisoft\Html\Html;
use Yiisoft\Translator\TranslatorInterface;

/**
 * @var string $moduleName
 * @var array $params
 * @var TranslatorInterface $translator
 */
?>
<p class = 'mail-recovery'>
    <?= $translator->translate('Hello, {username},', ['username' => $params['username']], 'user-mailer') ?>
</p>

<p class = 'mail-recovery'>
    <?= $translator->translate(
        'We have received a request to reset the password for your account on {moduleName}.',
        ['moduleName' => $moduleName],
        'user-mailer',
    ) ?>

    <?= $translator->translate('In order to complete your request, please click the link below:', [], 'user-mailer') ?>
</p>

<p class = 'mail-recovery'>
    <strong><?= Html::a(Html::encode($params['url']), $params['url']) ?></strong>
</p>

<p class = 'mail-recovery'>
    <?= $translator->translate(
        'If you cannot click the link, please try pasting the text into your browser.',
        [],
        'user-mailer',
    ) ?>
</p>
