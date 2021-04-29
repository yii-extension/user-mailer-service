<?php

declare(strict_types=1);

use Yiisoft\Translator\TranslatorInterface;

/**
 * @var string $moduleName
 * @var array $params
 * @var TranslatorInterface $translator
 */
?>
<?= $translator->translate('Hello, {username},', ['username' => $params['username']], 'user-mailer') ?>

<?= $translator->translate(
    'Thank you for signing up on {moduleName}.',
    ['moduleName' => $moduleName],
    'user-mailer',
) ?>
<?= $translator->translate('In order to complete your request, please click the link below:', [], 'user-mailer') ?>

<strong><?= $params['url'] ?></strong>

<?= $translator->translate(
    'If you cannot click the link, please try pasting the text into your browser.',
    [],
    'user-mailer',
) ?>
