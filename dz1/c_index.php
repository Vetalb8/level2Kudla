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

foreach($articles as $key => $article){
    $articles[$key]['intro'] = $articleClass->articles_intro($article);
}

//Кодировка
$coding = new Header();

// Внутренний шаблон ============
$temlate = new Template();
//ссылка на создание новой статьи
$cNew ='c_new.php';
//ссылки на статьи
$cArticle = 'c_article.php';
$content = $temlate->view_include('theme/v_index.php', array('articles' => $articles,
    'cNew' => $cNew,
    'cArticle' => $cArticle));

// Внешний шаблон ==============
$title = 'Новостная лента';
$active_item = 'index';
$page = $temlate->view_include('theme/v_main.php', array('title' => $title,
    'content' => $content,
    'active_item' => $active_item));

//Вывод
$temlate->showTamplate($page);

?>