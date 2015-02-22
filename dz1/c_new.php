<?php
//Подключение классов
include_once('m_article.class.php');
include_once('m_template.class.php');
include_once('m_connectDB.class.php');
include_once('m_header.class.php');

//Установка параметров, подключение к БД, запуск сессии
$connectDB = new ConnectDB('localhost','root','root','news');


// Обработка отправки формы
$articleClass = new Article();

if(!empty($_POST)){

    if($articleClass->articles_new($_POST['title'], $_POST['content'], $connectDB->link)){
        header('Location: c_editor.php');
        die();
    }

    $title = $_POST['title'];
    $content = $_POST['content'];
}else{
    $title = '';
    $content = '';
}


//Кодировка
$coding = new Header();

// Внутренний шаблон ============
$temlate = new Template();
//ссылки на редактирование статей
$cNew = 'c_new.php';
$content = $temlate->view_include('theme/v_new.php', array('title' => $title,
    'cNew' => $cNew,
    'content' => $content));


// Внешний шаблон ==============
$title = 'Новостная лента';
$active_item = '';
$page = $temlate->view_include('theme/v_main.php', array('title' => $title,
    'content' => $content,
    'active_item' => $active_item));

//Вывод
$temlate->showTamplate($page);

?>

