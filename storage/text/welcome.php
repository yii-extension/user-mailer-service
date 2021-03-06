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
<?= $translator->translate('Hello, {username},', ['username' => $params['username']], 'user-mailer') ?>

<?= $translator->translate(
    'Your account on {moduleName} has been created.',
    ['moduleName' => $moduleName],
    'user-mailer',
) ?>

<?php if ($params['showPassword']) : ?>
    <?= $translator->translate('We have generated a password for you:', [], 'user-mailer') ?>
    <strong><?= $params['password'] ?></strong>
<?php endif ?>

<?php if (isset($params['url'])) : ?>
    <?= $translator->translate('In order to complete your request, please click the link below:', [], 'user-mailer') ?>

    <strong><?= Html::a(Html::encode($params['url']), $params['url']) ?></strong>
    <?= $translator->translate(
        'If you cannot click the link, please try pasting the text into your browser.',
        [],
        'user-mailer',
    ) ?>
<?php endif ?>
