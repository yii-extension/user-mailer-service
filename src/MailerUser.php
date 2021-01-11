<?php

declare(strict_types=1);

namespace Yii\Extension\User\Service;

use Exception;
use Psr\Log\LoggerInterface;
use Yiisoft\Mailer\MailerInterface;
use Yiisoft\Mailer\MessageInterface;
use Yiisoft\Translator\TranslatorInterface;

final class MailerUser
{
    /** general config */
    private string $applicationName = '';
    private string $emailFrom = '';

    /** layouts emails */
    private array $confirmLayout = [];
    private array $recoveryLayout = [];
    private array $welcomeLayout = [];

    /** subjects messages */
    private string $confirmationSubject = '';
    private string $newPasswordSubject = '';
    private string $reconfirmationSubject = '';
    private string $recoverySubject = '';
    private string $welcomeSubject = '';
    private LoggerInterface $logger;
    private MailerInterface $mailer;
    private TranslatorInterface $translator;

    public function __construct(LoggerInterface $logger, MailerInterface $mailer, TranslatorInterface $translator)
    {
        $this->logger = $logger;
        $this->mailer = $mailer;
        $this->translator = $translator;
    }

    public function applicationName(string $value): void
    {
        $this->applicationName = $value;
    }

    public function emailFrom(string $value): void
    {
        $this->emailFrom = $value;
    }

    public function confirmLayout(array $value): void
    {
        $this->confirmLayout = $value;
    }

    public function recoveryLayout(array $value): void
    {
        $this->recoveryLayout = $value;
    }

    public function welcomeLayout(array $value): void
    {
        $this->recoveryLayout = $value;
    }

    public function getConfirmationSubject(): string
    {
        if (empty($this->confirmationSubject)) {
            $this->confirmationSubject(
                $this->translator->translate('Confirm account on {name}', ['name' => $this->applicationName]),
            );
        }

        return $this->confirmationSubject;
    }

    public function getNewPasswordSubject(): string
    {
        if ($this->newPasswordSubject === '') {
            $this->newPasswordSubject(
                $this->translator->translate(
                    'Your password on {name} has been changed',
                    ['name' => $this->applicationName],
                ),
            );
        }

        return $this->newPasswordSubject;
    }

    public function getReconfirmationSubject(): string
    {
        if ($this->reconfirmationSubject === '') {
            $this->reconfirmationSubject(
                $this->translator->translate('Confirm email change on {name}', ['name' => $this->applicationName]),
            );
        }

        return $this->reconfirmationSubject;
    }

    public function getRecoverySubject(): string
    {
        if (empty($this->recoverySubject)) {
            $this->recoverySubject(
                $this->translator->translate('Complete password reset on {name}', ['name' => $this->applicationName]),
            );
        }

        return $this->recoverySubject;
    }

    public function getWelcomeSubject(): string
    {
        if ($this->welcomeSubject === '') {
            $this->welcomeSubject(
                $this->translator->translate('Welcome to {name}', ['name' => $this->applicationName]),
            );
        }

        return $this->welcomeSubject;
    }

    public function confirmationSubject(string $value): void
    {
        $this->confirmationSubject = $value;
    }

    public function newPasswordSubject(string $value): void
    {
        $this->newPasswordSubject = $value;
    }

    public function reconfirmationSubject(string $value): void
    {
        $this->reconfirmationSubject = $value;
    }

    public function recoverySubject(string $value): void
    {
        $this->recoverySubject = $value;
    }

    public function welcomeSubject(string $value): void
    {
        $this->welcomeSubject = $value;
    }

    public function sendConfirmationMessage(string $email, array $params = []): bool
    {
        $params = array_merge(['applicationName' => $this->applicationName], $params);
        $message = $this->mailer->compose($this->confirmLayout, ['params' => $params])
            ->setFrom($this->emailFrom)
            ->setSubject($this->getConfirmationSubject())
            ->setTo($email);

        return $this->send($message);
    }

    public function sendRecoveryMessage(string $email, array $params = []): bool
    {
        $message = $this->mailer->compose($this->recoveryLayout, ['params' => $params])
            ->setFrom($this->emailFrom)
            ->setSubject($this->getRecoverySubject())
            ->setTo($email);

        return $this->send($message);
    }

    public function sendWelcomeMessage(string $email, array $params = []): bool
    {
        $message = $this->mailer->compose($this->welcomeLayout, ['params' => $params])
        ->setFrom($this->emailFrom)
        ->setSubject($this->getRecoverySubject())
        ->setTo($email);

        return $this->send($message);
    }

    private function send(MessageInterface $message): bool
    {
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
