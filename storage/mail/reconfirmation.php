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
<p class = 'mail-reconfirmation'>
    <?= $translator->translate('Hello, {username}', ['username' => $params['username']]) ?>.
</p>

<p class = 'mail-reconfirmation'>
    <?= $translator->translate(
        'We have received a request to change the email address for your account on {applicationName}',
        ['applicationName' => $applicationName],
    ) ?>.

    <?= $translator->translate('In order to complete your request, please click the link below') ?>.
</p>

<p class = 'mail-reconfirmation'>
    <strong><?= Html::a(Html::encode($params['url']), $params['url']) ?></strong>
</p>

<p class = 'mail-reconfirmation'>
    <?= $translator->translate('If you cannot click the link, please try pasting the text into your browser') ?>.
    <?= $translator->translate('If you did not make this request you can ignore this email') ?>.
</p>
