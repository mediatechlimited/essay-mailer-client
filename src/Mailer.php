<?php

namespace MailerClient;

use Illuminate\Support\Facades\Http;

class Mailer
{
    private $config;

    public function __construct()
    {
        $this->config = ConfigFactory::mailerConfig();
    }

    public function send($email, $template, $data)
    {
        $response = Http::post(
            $this->getApiUrl(),
            [
                'token' => $this->config['token'],
                'email' => $email,
                'template' => $template,
                'options' => json_encode($this->getOptions()),
                'data' => json_encode($data),
            ]
        );
        return $response->status();
    }

    private function getOptions()
    {
        return [
            'from'=> $this->config['from'],
            'appName'=> $this->config['appName'],
            'appURL'=> $this->config['appURL'],
            'domain' => $this->config['domain'],
        ];
    }

    private function getApiUrl()
    {
        return $this->config['apiDomain'] . $this->config['apiUrl'];
    }
}
