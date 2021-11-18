<?php

namespace MediaMailer;

class ConfigFactory
{
    public function mailerConfig(?string $mailerConfig = null): array
    {
        if ($mailerConfig === null) {
            $mailerConfig = config('mediatechlimited-mailer-client');
        }

        if (!isset($mailerConfig)) {
            throw new MailerException('Config not found');
        }

        return $mailerConfig;
    }
}
