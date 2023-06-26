<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# ОПИСАНИЕ ПРОЕКТА

В данном проекте реализуется создание блога с админ панелью на Laravel.
Данные хранятся в подключенной БД MySQL

# С чем работал в процессе создания проекта:

Маршрутизация;

Контроллеры;

Валидция;

Миграции;

Шаблоны view, layouts, sidebar;

Создание и связанных моделей;

Файлы ресурсов;

# ИНСТАЛЯЦИЯ

Склонируйте проект в директорию с сервером:

`git clone git@github.com:Null-ch/Laravel_blog.git`

Затем, открыв из папки проекта консоль, введите команду для установки пакетов ларавель:

`composer install`

Создайте базу данных на сервере и заполните поля файла .env, находящийся в папке проекта по примеру:

`DB_CONNECTION=mysql`

`DB_HOST=127.0.0.1`

`DB_PORT=3306`

`DB_DATABASE=laravelBlog`

`DB_USERNAME=root`

`DB_PASSWORD=`

В открытой консоли директории проекта введите команду для генерации таблиц базы данных:

`php artisan migrate`

В той же консоли для запуска сайта по адресу `http://localhost:8000` введите команду:

`php artisan serve`

В новой консоли для запуска NodeJS и корректной работы введите команду:

`npm run dev`

Откройте сайт в браузере по адресу  `http://localhost:8000`
## About
<details> 
<summary> Обзор текущего наполнения </summary>
<h4 align="center">Основная страница</h4>
<img src="https://github.com/Null-ch/Laravel_blog/assets/65172872/f41bd9a7-be92-4df6-b501-fe4fbfe259ce">
Демонстрация рабочего CRUD (теги)
<img src="https://github.com/Null-ch/Laravel_blog/assets/65172872/5a35f014-8fd4-4f0f-b128-25c01d891476">
</details> 
