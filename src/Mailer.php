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

    public function setSender($domain): self
    {
        $this->config['domain'] = $domain;
        return $this;
    }

    /**
     * @param $email - email address
     * @param $template - template name
     * @param $data - mail data
     * @return array
     */
    public function send($email, $template, $data)
    {
        $response = Http::acceptJson()->post(
            $this->getApiUrl(),
            [
                'token' => $this->getToken(),
                'email' => $email,
                'template' => $template,
                'options' => json_encode($this->getOptions()),
                'data' => json_encode($data),
                'domain' => $this->getDomain(),
                'mailer' => $this->getMailer(),
            ]
        );
        return [
            'status' => $response->status(),
            'body' => $response->body(),
        ];
    }

    private function getOptions()
    {
        return [
            'from'=> $this->config['from'],
            'appName'=> $this->config['appName'],
            'appURL'=> $this->config['appURL'],
        ];
    }

    private function getApiUrl()
    {
        return $this->config['apiDomain'] . $this->config['apiUrl'];
    }

    private function getToken()
    {
        return $this->config['token'];
    }

    private function getDomain()
    {
        return $this->config['domain'];
    }

    private function getMailer()
    {
        return $this->config['mailer'];
    }
}
