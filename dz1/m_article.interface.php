<?php
interface IArticle{
    // Список всех статей
    function articles_all($link);

    // Конкретная статья
    function article_get($id_article, $link);

    // Добавить статью
    function articles_new($title, $content, $link);

    // Изменить статью
    function articles_edit($id_article, $title, $content , $link);

    // Удалить статью
    function articles_delete($id_article, $link);

    // Короткое описание статьи
    function articles_intro($article);

}
?>