<?php
//Подключение классов
include_once __DIR__ . '/m_article.class.php';
include_once __DIR__ . '/m_template.class.php';
include_once __DIR__ . '/m_connectDB.class.php';
include_once __DIR__ . '/m_header.class.php';

//Установка параметров, подключение к БД, запуск сессии
$connectDB = new ConnectDB('localhost','root','root','news');
//определение объекта класса
$articleClass = new Article();

// Обработка отправки формы
if(isset($_POST['submit'])){

    if($articleClass->articles_edit($_POST['id'], $_POST['title'], $_POST['content'], $connectDB->link)){
        header('Location: c_editor.php');
        die();
    }
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
}elseif(isset($_POST['delete'])){
    if ($articleClass->articles_delete($_POST['id'], $connectDB->link)){
        header('Location: c_editor.php');
        die();
    }
}else{
    $art = $articleClass->article_get(($_GET['id']), $connectDB->link);
    $id = $_GET['id'];
    $title = $art['title'];
    $content = $art['content'];
}


//Кодировка
$coding = new Header();

// Внутренний шаблон ============
$temlate = new Template();
//ссылки на редактирование статей
$cEdit = 'c_edit.php';
$content = $temlate->view_include('theme/v_edit.php', array('title' => $title,
    'cEdit' => $cEdit,
    'content' => $content,
    'id' => $id));


// Внешний шаблон ==============
$title = 'Новостная лента';
$active_item = '';
$page = $temlate->view_include('theme/v_main.php', array('title' => $title,
    'content' => $content,
    'active_item' => $active_item));

//Вывод
$temlate->showTamplate($page);
?>
