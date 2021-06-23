### Настройка проекта

```php
1. Склонировать проект
2. Запустить docker-compose up --build -d
3. Попробовать запустить localhost:8088
```

### Возможные проблемы с правами и их устранение:
```php
1. Изменение пользователя папки и файлов
   sudo chown -R youuser:youuser /var/www/adminka
   sudo chown -R user:group /home/user/dir/
2. Изменение прав папки и файлов
   sudo chmod -R 777 /var/www/adminka
```