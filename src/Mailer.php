<?php

namespace MediaMailer;

use Illuminate\Support\Facades\Http;

class Mailer
{
    private ConfigFactory $configFactory;

    public function __construct(ConfigFactory $configFactory)
    {
        $this->configFactory = $configFactory;
    }

    public function send($email, $template, $data)
    {
        $response = Http::post(
            $this->getApiUrl(),
            [
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
        $config = $this->configFactory->mailerConfig();
        return [
            'from'=> $config['from'],
            'appName'=> $config['appName'],
            'appURL'=> $config['appURL'],
            'domain' => $config['domain'],
        ];
    }

    private function getApiUrl()
    {
        $config = $this->configFactory->mailerConfig();
        return $config['apiDomain'] . $config['apiUrl'];
    }
}
