<?php
//Подключение классов
include_once('m_article.class.php');
include_once('m_template.class.php');
include_once('m_connectDB.class.php');
include_once('m_header.class.php');

//Установка параметров, подключение к БД, запуск сессии
$connectDB = new ConnectDB('localhost','root','root','news');


if(isset($_GET['id'])){
    $id = $_GET['id'];
}else{
    header('Location: index.php');
}

//Извлечение статей
$articleClass = new Article();
$article = $articleClass->article_get($id, $connectDB->link);

//Кодировка
$coding = new Header();

// Внутренний шаблон ============
$temlate = new Template();
//ссылки на редактирование статей
$content = $temlate->view_include('theme/v_article.php', array('article' => $article));


// Внешний шаблон ==============
$title = 'Новостная лента';
$active_item = '';
$page = $temlate->view_include('theme/v_main.php', array('title' => $title,
    'content' => $content,
    'active_item' => $active_item));

//Вывод
$temlate->showTamplate($page);
?>
