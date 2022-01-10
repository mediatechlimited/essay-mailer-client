# essay-mailer-client
добавить в composer.json

"repositories": {
    "mediatechlimited/essay-mailer-client": {
        "type": "vcs",
        "url": "git@github.com:mediatechlimited/essay-mailer-client.git"
    }
}

установить пакет composer required essay/mailer-client

развернуть конфиг php artisan vendor:publish --tag=config

в .env установить соответсвующие параметры

MAILER_TOKEN=

MAILER_DOMAIN=

MAILER_EMAIL_FROM=

MAILER_MAILER=