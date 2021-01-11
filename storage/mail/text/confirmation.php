<?php

declare(strict_types=1);

use Yiisoft\Translator\TranslatorInterface;

/**
 * @var string $applicationName
 * @var array $params
 * @var TranslatorInterface $translator
 */
?>
<?= $translator->translate('Hello, {username}', ['username' => $params['username']]) ?>.

<?= $translator->translate('Thank you for signing up on {applicationName}', ['applicationName' => $applicationName]) ?>.
<?= $translator->translate('In order to complete your registration, please click the link below') ?>:

<strong><?= $params['url'] ?></strong>

<?= $translator->translate('If you cannot click the link, please try pasting the text into your browser') ?>.
<?= $translator->translate('If you did not make this request you can ignore this email') ?>.
