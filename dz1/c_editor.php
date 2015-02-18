<?php
include_once('view.php');
include_once('m_startup.php');
include_once('m_model.php');

//Установка параметров, подключение к БД, запуск сессии
startup();

//Извлечение статей
$articles = articles_all();

//Кодировка
header('Content-type: text/html; charset=utf-8');


// Внутренний шаблон ============

//ссылки на редактирование статей
$cEdit = 'c_edit.php';
$content = view_include('theme/v_editor.php', array('articles' => $articles,
    'cEdit' => $cEdit));


// Внешний шаблон ==============
$title = 'Новостная лента';
$active_item = 'editor';
$page = view_include('theme/v_main.php', array('title' => $title,
    'content' => $content,
    'active_item' => $active_item));

//Вывод
echo $page;

?>





