<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<p align="center"><a href="https://softwarecenter.ru/" target="_blank"><img src="https://github.com/Null-ch/SWC_laravel_test_task/assets/65172872/4db4af6e-af19-4cfe-9f9f-109b88883ae7" width="400"></a></p>

# ОПИСАНИЕ ПРОЕКТА

В данном проекте реализуется создание блога с админ панелью на Laravel.
Данные хранятся в подключенной БД MySQL


Склонируйте проект в директорию с сервером:

`git clone https://github.com/Null-ch/SWC_laravel_test_task.git`

Создайте базу данных на сервере и заполните поля файла .env, находящийся в папке проекта по примеру (скопируйте env example и сделайте из него основной env файл):

`DB_CONNECTION=mysql`

`DB_HOST=127.0.0.1`

`DB_PORT=3306`

`DB_DATABASE=laravelBlog`

`DB_USERNAME=root`

`DB_PASSWORD=`

При необходимости сгенерируйте app key
`php artisan key:generate`

Затем, открыв из папки проекта консоль, введите команду для установки/обновления пакетов ларавел:

`composer update`

В открытой консоли директории проекта введите команду для генерации таблиц базы данных:

`php artisan migrate`

В той же консоли для запуска сайта по адресу `http://localhost:8000` введите команду:

`php artisan serve`

В новой консоли для запуска NodeJS и корректной работы введите команду:

`npm install`
`npm run dev`

Откройте сайт в браузере по адресу  `http://localhost:8000`
## Задание
1. Необходимо создать БД под управлением MySQL со следующими
сущностями:
а) Пользователь:
- id;
- Логин;
- Пароль;
- Имя;
- Фамилия;
- Дата регистрации;
- Дата рождения.
Все поля, кроме 'Дата рождения' не могут принимать нулевые значения
b) Event
- id;
- Заголовок;
- Текст;
- Дата создания;
- Создатель (сущность Пользователь);
- Участники (сущность Пользователи).
Все значения ненулевые.
2. Разработать RESTful API для:
а) регистрация пользователя;
b) авторизация пользователя;
c) создание события;
d) получение списка событий;
e) участие в событии;
f) отмена участия в событии;
g) удаление события создателем.
Ответ с сервера должен приходить в виде такого JSON: {"error":null,
"result":{"id":1, "first_name":"Вася", "last_name":"Петров"}}.
3. Создать простую админку, используя AdminLTE:
- регистрация пользователя;
- авторизация пользователя;

- список событий;
- информация о пользователе.
Если в процессе регистрации или авторизации произошла ошибка,
необходимо показать диалоговое окно с описанием ошибки. При
успешной регистрации или авторизации открывается окно со списком
событий (см. скрин).
При просмотре НЕ своего события внизу находится кнопка "Принять
участие", при просмотре своего события - кнопка "Отказаться от участия"
Элементы "Все события" и "Участники" должны обновляться каждые 30
секунд, по возможности, без перезагрузки страницы.
При клике на участника показывается экран информации об участнике в
произвольном виде.
<img src="https://github.com/Null-ch/SWC_laravel_test_task/assets/65172872/db812f91-8c02-4516-b6f1-d821a3a2b4a1">

Создание события
<img src="https://github.com/Null-ch/SWC_laravel_test_task/assets/65172872/04082b55-2a9c-496c-b1ad-54781a9827af">
Присоединяемся к событию
<img src="https://github.com/Null-ch/SWC_laravel_test_task/assets/65172872/c195c2bd-e7dd-4967-83e4-61df63afcf99">
Редактирование события (если вы его создатель)
<img src="https://github.com/Null-ch/SWC_laravel_test_task/assets/65172872/10524efc-2174-4b77-938f-81c94dac9e17">
Удаление события (если вы являетесь его создателем)
<img src="https://github.com/Null-ch/SWC_laravel_test_task/assets/65172872/b330642b-905c-4cba-81a5-a80bef91fb9d">
Отказ от участия в событии
<img src="https://github.com/Null-ch/SWC_laravel_test_task/assets/65172872/3a6c7b42-3e88-4802-a185-4787c1ad2c12">
Просмотр информации о событии, переход на карточку участника события
<img src="https://github.com/Null-ch/SWC_laravel_test_task/assets/65172872/851bf26c-07c1-4f7a-8f05-331a93fbd4a9">




