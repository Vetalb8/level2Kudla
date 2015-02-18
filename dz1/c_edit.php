<?php
include_once('view.php');
include_once('m_startup.php');
include_once('m_model.php');

//Установка параметров, подключение к БД, запуск сессии
startup();

// Обработка отправки формы
if(isset($_POST['submit'])){

    if(articles_edit($_POST['id'], $_POST['title'], $_POST['content'])){
        header('Location: c_editor.php');
        die();
    }
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
}elseif(isset($_POST['delete'])){
    if (articles_delete($_POST['id'])){
        header('Location: c_editor.php');
        die();
    }
}else{
    $art = article_get($_GET['id']);
    $id = $_GET['id'];
    $title = $art['title'];
    $content = $art['content'];
}


//Кодировка
header('Content-type: text/html; charset=utf-8');

// Внутренний шаблон ============

//ссылки на редактирование статей
$cEdit = 'c_edit.php';
$content = view_include('theme/v_edit.php', array('title' => $title,
    'cEdit' => $cEdit,
    'content' => $content,
    'id' => $id));


// Внешний шаблон ==============
$title = 'PHP. Уровень 2';
$active_item = '';
$page = view_include('theme/v_main.php', array('title' => $title,
    'content' => $content,
    'active_item' => $active_item));

//Вывод
echo $page;
?>
