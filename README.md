### Настройка проекта

```php
1. Скопировать .env и прописать название проекта вместо symfonyimage myproject
2. Изменить название папок проекта, если нужно (app)
3. Изменить порт для урла nginx в файле docker-compose.yml
4. Выгрузить в новый репозиторий
5. Запустить docker-compose up --build -d
6. Войти в консоль контейнера docker exec -it myproject-app-php-cli bash
7. Запустить в консоле контейнера composer create-project symfony/website-skeleton app
sudo chown -R denis:denis /var/www/myproject/app
8. Скопировать содержимое папки app/app в папку app и папку app/app удалить
9. Попробовать запустить localhost:8087
10. Прописать хосты если потребуется localhost:8087
```

### Запуск нового проекта
```php
1. Создать новый пустой репозиторий
2. Склонировать его себе
3. Скопировать туда проект из репозитория https://github.com/denlem/symfonyimage.git
   но только файлы, а не сам репозииторий
4. Проделать шаги по настройке проекта (см выше) изменив название и порт
```


### Запуск проекта

```php
cp .env.test .env
docker-compose up --build -d
cd app
# cp .env.test .env
```

Чтобы войти в любой из контейнеров, делаем следующее:
```php
docker exec -it <container_name> bash
docker exec -it symfonyimage-app-php-cli bash
```

Посмотреть запущенные контейнеры:
```php
docker ps
```

Логи контейнера:
```php
docker logs <container_name>
```

Настройки композера:
```php
composer require symfony/http-foundation
composer require symfony/routing
composer require symfony/http-kernel
composer require --dev phpunit/phpunit
composer require symfony/event-dispatcher
```

Ссылка для запуска проекта:
```php
http://localhost:8083/is_leap_year/2222
```

Изменение прав папок:
```php
1. Изменение пользователя папки и файлов
   sudo chown -R denis:denis /var/www/darix
   sudo chown -R user:group /home/user/dir/
2. Изменение прав папки и файлов
   sudo chmod -R 777 /var/www/darix/serv
```

Запуск модульных тестов:
```php
./vendor/bin/phpunit
```