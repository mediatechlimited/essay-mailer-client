# essay-mailer-client

### Установка

1. Добавить в composer.json
```json
 "repositories": {
     "mediatechlimited/essay-mailer-client": {
         "type": "vcs",
         "url": "git@github.com:mediatechlimited/essay-mailer-client.git"
     }
 }
```

2. Установить пакет
```
composer required essay/mailer-client
```

3. Развернуть конфиг
```
php artisan vendor:publish --tag=config
```

4. в .env установить соответсвующие параметры
```env
MAILER_TOKEN=
MAILER_DOMAIN=
MAILER_EMAIL_FROM=
MAILER_MAILER=
```

### Подмена отправителя
Для подмены данных о проекте отправителе следует вызвать метод setConfig (можно в цепочке).
В него нужно передать массив с новыми значениями для config.

Например:

```php
$mailer->setConfig([
    'domain' => 'mysite.org',
    'appURL' => 'www.mysite.org',
    'appName' => 'My Site'
])->send(...);
```