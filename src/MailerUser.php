<?php

declare(strict_types=1);

namespace Yii\Extension\User\Service;

use Exception;
use Psr\Log\LoggerInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\Mailer\File;
use Yiisoft\Mailer\MailerInterface;
use Yiisoft\Mailer\MessageBodyTemplate;
use Yiisoft\Mailer\MessageInterface;
use Yiisoft\Translator\TranslatorInterface;

final class MailerUser
{
    /** general config */
    private string $emailFrom = '';
    private string $moduleName = '';
    private string $signatureTextEmail = '';
    private ?File $file = null;
    private string $viewPath = '';

    /** layouts emails */
    /** @var array<string, string> */
    private array $confirmationLayout = [];
    /** @var array<string, string> */
    private array $reconfirmationLayout = [];
    /** @var array<string, string> */
    private array $recoveryLayout = [];
    /** @var array<string, string> */
    private array $welcomeLayout = [];

    /** subjects messages */
    private string $confirmationSubject = '';
    private string $newPasswordSubject = '';
    private string $reconfirmationSubject = '';
    private string $recoverySubject = '';
    private string $welcomeSubject = '';

    private Aliases $aliases;
    private LoggerInterface $logger;
    private MailerInterface $mailer;
    private TranslatorInterface $translator;

    public function __construct(
        Aliases $aliases,
        LoggerInterface $logger,
        MailerInterface $mailer,
        TranslatorInterface $translator
    ) {
        $this->aliases = $aliases;
        $this->logger = $logger;
        $this->mailer = $mailer;
        $this->translator = $translator;
    }

    public function emailFrom(string $value): void
    {
        $this->emailFrom = $value;
    }

    public function getConfirmationSubject(): string
    {
        if (empty($this->confirmationSubject)) {
            $this->confirmationSubject = $this->translator->translate(
                'Confirm account on {moduleName}',
                ['moduleName' => $this->moduleName],
                'user-mailer',
            );
        }

        return $this->confirmationSubject;
    }

    public function getNewPasswordSubject(): string
    {
        if (empty($this->newPasswordSubject)) {
            $this->newPasswordSubject = $this->translator->translate(
                'Your password on {moduleName} has been changed',
                ['moduleName' => $this->moduleName],
                'user-mailer',
            );
        }

        return $this->newPasswordSubject;
    }

    public function getReconfirmationSubject(): string
    {
        if (empty($this->reconfirmationSubject)) {
            $this->reconfirmationSubject = $this->translator->translate(
                'Confirm email change on {moduleName}',
                ['moduleName' => $this->moduleName],
                'user-mailer',
            );
        }

        return $this->reconfirmationSubject;
    }

    public function getRecoverySubject(): string
    {
        if (empty($this->recoverySubject)) {
            $this->recoverySubject = $this->translator->translate(
                'Complete password reset on {moduleName}',
                ['moduleName' => $this->moduleName],
                'user-mailer',
            );
        }

        return $this->recoverySubject;
    }

    public function getWelcomeSubject(): string
    {
        if (empty($this->welcomeSubject)) {
            $this->welcomeSubject = $this->translator->translate(
                'Welcome to {moduleName}',
                ['moduleName' => $this->moduleName],
                'user-mailer',
            );
        }

        return $this->welcomeSubject;
    }

    /**
     * @param array<string, string> $value
     */
    public function confirmationLayout(array $value): void
    {
        $this->confirmationLayout = $value;
    }

    public function confirmationSubject(string $value): void
    {
        $this->confirmationSubject = $value;
    }

    public function moduleName(string $value): void
    {
        $this->moduleName = $value;
    }

    public function newPasswordSubject(string $value): void
    {
        $this->newPasswordSubject = $value;
    }

    /**
     * @param array<string, string> $value
     */
    public function reconfirmationLayout(array $value): void
    {
        $this->reconfirmationLayout = $value;
    }

    public function reconfirmationSubject(string $value): void
    {
        $this->reconfirmationSubject = $value;
    }

    /**
     * @param array<string, string> $value
     */
    public function recoveryLayout(array $value): void
    {
        $this->recoveryLayout = $value;
    }

    public function recoverySubject(string $value): void
    {
        $this->recoverySubject = $value;
    }

    public function signatureImageEmail(string $value): void
    {
        $value = $this->aliases->get($value);

        $this->file = File::fromPath($value, basename($value), mime_content_type($value));
    }

    public function signatureTextEmail(string $value): void
    {
        $this->signatureTextEmail = $value;
    }

    /**
     * @param array<string, string> $value
     */
    public function welcomeLayout(array $value): void
    {
        $this->welcomeLayout = $value;
    }

    public function welcomeSubject(string $value): void
    {
        $this->welcomeSubject = $value;
    }

    public function viewPath(string $value): void
    {
        $this->viewPath = $this->aliases->get($value);

        $this->mailer = $this->mailer->withTemplate(
            new MessageBodyTemplate(
                $this->viewPath,
            )
        );
    }

    public function sendConfirmationMessage(string $email, array $params = []): bool
    {
        $message = $this->mailer->compose(
            $this->confirmationLayout,
            [
                'moduleName' => $this->moduleName,
                'translator' => $this->translator,
                'params' => $params
            ],
            [
                'signatureTextEmail' => $this->signatureTextEmail,
                'translator' => $this->translator,
                'file' => $this->file
            ],
        )
            ->withFrom($this->emailFrom)
            ->withSubject($this->getConfirmationSubject())
            ->withTo($email);

        return $this->send($message);
    }

    public function sendReconfirmationMessage(string $email, array $params = []): bool
    {
        $message = $this->mailer->compose(
            $this->reconfirmationLayout,
            [
                'moduleName' => $this->moduleName,
                'translator' => $this->translator,
                'params' => $params
            ],
            [
                'signatureTextEmail' => $this->signatureTextEmail,
                'translator' => $this->translator,
                'file' => $this->file
            ],
        )
            ->withFrom($this->emailFrom)
            ->withSubject($this->getRecoverySubject())
            ->withTo($email);

        return $this->send($message);
    }

    public function sendRecoveryMessage(string $email, array $params = []): bool
    {
        $message = $this->mailer->compose(
            $this->recoveryLayout,
            [
                'moduleName' => $this->moduleName,
                'translator' => $this->translator,
                'params' => $params
            ],
            [
                'signatureTextEmail' => $this->signatureTextEmail,
                'translator' => $this->translator,
                'file' => $this->file
            ],
        )
            ->withFrom($this->emailFrom)
            ->withSubject($this->getRecoverySubject())
            ->withTo($email);

        return $this->send($message);
    }

    public function sendWelcomeMessage(string $email, array $params = []): bool
    {
        $message = $this->mailer->compose(
            $this->welcomeLayout,
            [
                'moduleName' => $this->moduleName,
                'translator' => $this->translator,
                'params' => $params
            ],
            [
                'signatureTextEmail' => $this->signatureTextEmail,
                'translator' => $this->translator,
                'file' => $this->file
            ],
        )
            ->withFrom($this->emailFrom)
            ->withSubject($this->getWelcomeSubject())
            ->withTo($email);

        return $this->send($message);
    }

    private function send(MessageInterface $message): bool
    {
        if ($this->file !== null) {
            $message = $message->withEmbedded($this->file);
        }

        $result = false;

        try {
            $this->mailer->send($message);
            $result = true;
        } catch (Exception $e) {
            $this->logger->error($e->getMessage());
        }

        return $result;
    }
}
