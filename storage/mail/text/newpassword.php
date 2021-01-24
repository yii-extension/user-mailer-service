<?php

declare(strict_types=1);

use Yiisoft\Translator\TranslatorInterface;

/**
 * @var string $applicationName
 * @var array $params
 * @var TranslatorInterface $translator
 */
?>
<?= $translator->translate('Hello, {username},', ['username' => $params['username']], 'user-mailer') ?>

<?= $translator->translate(
    'Your account on {applicationName} has a new password',
    ['applicationName' => $applicationName],
    'user-mailer'
) ?>.

<?= $translator->translate('We have generated a password for you:') ?>
<strong><?= $params['password'] ?></strong>

<?= $translator->translate('If you did not make this request you can ignore this email.', [], 'user-mailer') ?>
