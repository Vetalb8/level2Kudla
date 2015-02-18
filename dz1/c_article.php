<?php
include_once('view.php');
include_once('m_startup.php');
include_once('m_model.php');

//Установка параметров, подключение к БД, запуск сессии
startup();
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('Location: index.php');
}

//Извлечение статей
$article = article_get($id);

//Кодировка
header('Content-type: text/html; charset=utf-8');

// Внутренний шаблон ============

//ссылки на редактирование статей
$content = view_include('theme/v_article.php', array('article' => $article));


// Внешний шаблон ==============
$title = 'Новостная лента';
$active_item = '';
$page = view_include('theme/v_main.php', array('title' => $title,
    'content' => $content,
    'active_item' => $active_item));

//Вывод
echo $page;
?>
