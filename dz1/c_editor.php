<?php
//Подключение классов
include_once __DIR__ . '/m_article.class.php';
include_once __DIR__ . '/m_template.class.php';
include_once __DIR__ . '/m_connectDB.class.php';
include_once __DIR__ . '/m_header.class.php';

//Установка параметров, подключение к БД, запуск сессии
$connectDB = new ConnectDB('localhost','root','root','news');

//Извлечение статей
$articleClass = new Article();
$articles = $articleClass->articles_all($connectDB->link);

//Кодировка
$coding = new Header();


// Внутренний шаблон ============
$temlate = new Template();
//ссылки на редактирование статей
$cEdit = 'c_edit.php';
$content = $temlate->view_include('theme/v_editor.php', array('articles' => $articles,
    'cEdit' => $cEdit));


// Внешний шаблон ==============
$title = 'Новостная лента';
$active_item = 'editor';
$page = $temlate->view_include('theme/v_main.php', array('title' => $title,
    'content' => $content,
    'active_item' => $active_item));

//Вывод
$temlate->showTamplate($page);

?>