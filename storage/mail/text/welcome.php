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
<?= $translator->translate('Hello, {username}', ['username' => $params['username']]) ?>.

<?= $translator->translate(
    'Your account on {applicationName} has been created',
    ['applicationName' => $applicationName]
) ?>.

<?php if ($params['showPassword']) : ?>
    <?= $translator->translate('We have generated a password for you: ') ?><strong><?= $params['password'] ?></strong>
<?php endif ?>

<?php if (isset($params['url'])) : ?>
    <?= $translator->translate('In order to complete your registration, please click the link below') ?>.

    <strong><?= Html::a(Html::encode($params['url']), $params['url']) ?></strong>
<?php endif ?>

<?= $translator->translate('If you cannot click the link, please try pasting the text into your browser') ?>.
<?= $translator->translate('If you did not make this request you can ignore this email') ?>.

