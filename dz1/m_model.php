<?php

// Список всех статей
function articles_all(){
    $hostname = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbName = 'news';


    //Языковая настройка
    setlocale(LC_ALL, 'ru_RU.utf8');

    date_default_timezone_set('Europe/Moscow');

    //Подключение к БД
    $link = mysqli_connect($hostname, $username, $password, $dbName)
        or die('Ошибка к подключению базы данных');

    mysqli_query($link, "SET NAMES utf8");

    //Запрос
    $query = "SELECT * FROM articles ORDER BY id_article DESC";
    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    //Извлечение из БД
    $n = mysqli_num_rows($result);
    $articles = array();

    for ($i = 0; $i < $n; $i++){
        $row = mysqli_fetch_array($result);
        $articles[] = $row;
    }
    return $articles;
}

// Конкретная статья
function article_get($id_article){
    $hostname = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbName = 'news';


    //Языковая настройка
    setlocale(LC_ALL, 'ru_RU.utf8');

    date_default_timezone_set('Europe/Moscow');

    //Подключение к БД
    $link = mysqli_connect($hostname, $username, $password, $dbName)
        or die('Ошибка к подключению базы данных');

    mysqli_query($link, "SET NAMES utf8");

    //Запрос
    $query = "SELECT * FROM articles WHERE id_article = '$id_article'";

    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    //Извлечение из БД

    $row = mysqli_fetch_array($result);

    return $row;
}

// Добавить статью
function articles_new($title, $content){

    $hostname = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbName = 'news';


    //Языковая настройка
    setlocale(LC_ALL, 'ru_RU.utf8');

    date_default_timezone_set('Europe/Moscow');

    //Подключение к БД
    $link = mysqli_connect($hostname, $username, $password, $dbName)
        or die('Ошибка к подключению базы данных');

    mysqli_query($link, "SET NAMES utf8");

    //Подготовка
    $title = trim($title);
    $content = trim($content);

    //Проверка
    if ($title == '')
        return false;

    //Запрос
    $t = "INSERT INTO articles (title, content)
                      VALUES ('%s', '%s')";

    $query = sprintf($t, mysqli_real_escape_string($link, $title),
                        mysqli_real_escape_string($link, $content));


    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return true;
}

// Изменить статью
function articles_edit($id_article, $title, $content){

    $hostname = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbName = 'news';


    //Языковая настройка
    setlocale(LC_ALL, 'ru_RU.utf8');

    date_default_timezone_set('Europe/Moscow');

    //Подключение к БД
    $link = mysqli_connect($hostname, $username, $password, $dbName)
        or die('Ошибка к подключению базы данных');

    mysqli_query($link, "SET NAMES utf8");

    //Подготовка
    $title = trim($title);
    $content = trim($content);

    //Проверка
    if(!$id_article)
        return false;
    if($title == '')
        return false;

    //Запрос
    $query = "UPDATE articles
            SET title = '$title', content = '$content'
          WHERE id_article = $id_article";

    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return true;
}

// Удалить статью
function articles_delete($id_article){

    $hostname = 'localhost';
    $username = 'root';
    $password = 'root';
    $dbName = 'news';


    //Языковая настройка
    setlocale(LC_ALL, 'ru_RU.utf8');

    date_default_timezone_set('Europe/Moscow');

    //Подключение к БД
    $link = mysqli_connect($hostname, $username, $password, $dbName)
        or die('Ошибка к подключению базы данных');

    mysqli_query($link, "SET NAMES utf8");


    //Запрос
    $query = "DELETE FROM articles
          WHERE id_article = $id_article";

    $result = mysqli_query($link, $query);

    if(!$result)
        die(mysqli_error($link));

    return true;

}

