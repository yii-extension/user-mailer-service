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
    'Your account on {moduleName} has a new password.',
    ['moduleName' => $moduleName],
    'user-mailer'
) ?>

<?= $translator->translate('We have generated a password for you:', [], 'user-mailer') ?>
<strong><?= $params['password'] ?></strong>
