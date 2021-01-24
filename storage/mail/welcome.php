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
<p class = 'mailer-welcome'>
    <?= $translator->translate('Hello, {username},', ['username' => $params['username']], 'user-mailer') ?>
</p>

<p class = 'mailer-welcome'>
    <?= $translator->translate(
        'Your account on {applicationName} has been created.',
        ['applicationName' => $applicationName]
        'user-mailer'
    ) ?>

    <?php if ($params['showPassword']) : ?>
        <?= $translator->translate('We have generated a password for you:', [], 'user-mailer') ?>
        <strong><?= $params['password'] ?></strong>
    <?php endif ?>
</p>

<?php if (isset($params['url'])) : ?>
    <p class = 'mailer-welcome'>
        <?= $translator->translate('In order to complete your request, please click the link below:', [], 'user-mailer') ?>
    </p>
    <p class = 'mailer-welcome'>
        <strong><?= Html::a(Html::encode($params['url']), $params['url']) ?></strong>
    </p>
<?php endif ?>

<p class = 'mailer-welcome'>
    <?= $translator->translate('If you cannot click the link, please try pasting the text into your browser.', [], 'user-mailer') ?>
    <?= $translator->translate('If you did not make this request you can ignore this email.', [], 'user-mailer') ?>
</p>
