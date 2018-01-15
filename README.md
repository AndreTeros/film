1. Настройка:
 - в файле config/db.php задать необходимые настройки для БД(хост, логин, пароль, имя БД);
 - в config/files.php задать полный путь приложения на сервере.
 
2. Создать структуру БД из дампа dump.sql

3. Приложение имеет 5 страниц:
 - список(здесь все фильмы отсортированы по названию, 
   с этой страницы можно произвести удаления фильма или перейди на детальную страницу);
 - детальная(подробная информация о фильме, переход осуществляется со страницы списка или поиска);
 - добавление(форма, позволяющая добавить один фильм);
 - поиск(поиск фильма по частично введенному названию или имени актера в фильме);
 - импорт(позволяет добавить сразу несколько фильмов из файла определенной структуры).
 
4. Структура:
 - app/main/application.php - основной класс, запуск приложения;
 - app/main/db.php - класс для работы с БД;
 - app/controller - содержит файлы контроллеров;
 - app/model - содержит файлы моделей;
 - app/view - содержит файлы представлений.
