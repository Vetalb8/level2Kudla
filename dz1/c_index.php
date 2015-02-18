<?php
include_once('view.php');
include_once('m_startup.php');
include_once('m_model.php');

//Установка параметров, подключение к БД, запуск сессии
startup();

//Извлечение статей
$articles = articles_all();

foreach($articles as $key => $article){
    $articles[$key] = $article;
}

//Кодировка
header('Content-type: text/html; charset=utf-8');

// Внутренний шаблон ============
//ссылка на создание новой статьи
$cNew ='c_new.php';
//ссылки на статьи
$cArticle = 'c_article.php';
$content = view_include('theme/v_index.php', array('articles' => $articles,
                                                    'cNew' => $cNew,
                                                    'cArticle' => $cArticle));


// Внешний шаблон ==============
$title = 'Новостная лента';
$active_item = 'index';
$page = view_include('theme/v_main.php', array('title' => $title,
    'content' => $content,
    'active_item' => $active_item));

//Вывод
echo $page;
//
?>





