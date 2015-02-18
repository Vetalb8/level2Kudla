<?php
include_once('view.php');
include_once('m_startup.php');
include_once('m_model.php');

//Установка параметров подключения к БД, запуск сессии
startup();

// Обработка отправки формы
if(!empty($_POST)){

    if(articles_new($_POST['title'], $_POST['content'])){
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
header('Content-type: text/html; charset=utf-8');

// Внутренний шаблон ============

//ссылки на редактирование статей
$cNew = 'c_new.php';
$content = view_include('theme/v_new.php', array('title' => $title,
    'cNew' => $cNew,
    'content' => $content));


// Внешний шаблон ==============
$title = 'Новостная лента';
$active_item = '';
$page = view_include('theme/v_main.php', array('title' => $title,
    'content' => $content,
    'active_item' => $active_item));

//Вывод
echo $page;

?>

