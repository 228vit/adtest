Тестовое задание для adviator.com

Установка
$ git clone https://github.com/228vit/adtest
$ cd adtest
$ php composer.phar update
$ HTTPDUSER=`ps aux | grep -E '[a]pache|[h]ttpd|[_]www|[w]ww-data|[n]ginx' | grep -v root | head -1 | cut -d\  -f1`
$ sudo setfacl -R -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs
$ sudo setfacl -dR -m u:"$HTTPDUSER":rwX -m u:`whoami`:rwX app/cache app/logs

Запуск
$ php app/console server:start

Проверка
http://127.0.0.1:8000/app_dev.php