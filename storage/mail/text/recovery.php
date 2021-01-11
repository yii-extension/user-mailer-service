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
   'We have received a request to reset the password for your account on {applicationName}',
   ['applicationName' => $applicationName],
) ?>.

<?= $translator->translate('Please click the link below to complete your password reset') ?>.

<strong><?= Html::a(Html::encode($params['url']), $params['url']) ?></strong>

<?= $translator->translate('If you cannot click the link, please try pasting the text into your browser') ?>.
<?= $translator->translate('If you did not make this request you can ignore this email') ?>.

