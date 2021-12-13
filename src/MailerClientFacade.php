<?php

namespace MailerClient;

use Illuminate\Support\Facades\Facade;

class MailerClientFacade extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Generator::class;
    }
}
