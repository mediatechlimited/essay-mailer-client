<?php

namespace MailerClient;

class ConfigFactory
{
    public static function mailerConfig(?string $mailerConfig = null): array
    {
        if ($mailerConfig === null) {
            $mailerConfig = config('mailer-client');
        }

        if (!isset($mailerConfig)) {
            throw new MailerException('Config not found');
        }

        return $mailerConfig;
    }
}
