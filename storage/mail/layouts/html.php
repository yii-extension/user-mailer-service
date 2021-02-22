<?php

declare(strict_types=1);

use Yiisoft\Html\Html;
use Yiisoft\Mailer\File;

/**
 * @var array $content
 * @var string $signatureTextEmail
 * @var File $file
 */
?>

<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns = 'http://www.w3.org/1999/xhtml'>
    <head>
        <meta name = 'viewport' content = 'width=device-width'>
        <meta http-equiv = 'Content-Type' content = 'text/html;charset=UTF-8'>
    </head>
    <body class = 'mailer-html-body'>
        <?php $this->beginBody() ?>
            <?= $content ?>
        <?php $this->endBody() ?>

        <div class = 'mailer-html-p-content'>
            <?= Html::img($file->cid()) ?>
        </div>
        <div>
            <?= $signatureTextEmail ?>
        </div>
        <div>
            <br/>
            <strong>
                <?= $translator->translate('If you did not make this request you can ignore this email.', [], 'user-mailer') ?>
            </strong>
        </div>
    </body>
</html>
<?php $this->endPage();
