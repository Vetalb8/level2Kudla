<?php
require_once __DIR__ . '/m_article.interface.php';

class Article implements IArticle{
    // Список всех статей
    public function articles_all($link){
        //Запрос
        $query = "SELECT * FROM articles ORDER BY id_article DESC";
        $result = mysqli_query($link, $query);

        if (!$result)
            die(mysqli_error($link));

        //Извлечение из БД
        $n = mysqli_num_rows($result);
        $articles = array();

        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_array($result);
            $articles[] = $row;
        }
        return $articles;
    }

    // Конкретная статья
    public function article_get($id_article ,$link){
        //Запрос
        $query = "SELECT * FROM articles WHERE id_article = '$id_article'";

        $result = mysqli_query($link, $query);

        if (!$result)
            die(mysqli_error($link));

        //Извлечение из БД

        $row = mysqli_fetch_array($result);

        return $row;
    }

    // Добавить статью
    public function articles_new($title, $content, $link){
        //Подготовка
        $title = trim($title);
        $content = trim($content);

        //Проверка
        if ($title == '')
            return false;

        //Запрос
        $t = "INSERT INTO articles (title, content)
                      VALUES ('%s', '%s')";

        $query = sprintf($t, mysqli_real_escape_string($link, $title),
            mysqli_real_escape_string($link, $content));


        $result = mysqli_query($link, $query);

        if (!$result)
            die(mysqli_error($link));

        return true;
    }

    // Изменить статью
    public function articles_edit($id_article, $title, $content , $link){
        //Подготовка
        $title = trim($title);
        $content = trim($content);

        //Проверка
        if (!$id_article)
            return false;
        if ($title == '')
            return false;

        //Запрос
        $query = "UPDATE articles
            SET title = '$title', content = '$content'
          WHERE id_article = $id_article";

        $result = mysqli_query($link, $query);

        if (!$result)
            die(mysqli_error($link));

        return true;
    }

    // Удалить статью
    public function articles_delete($id_article, $link){
        //Запрос
        $query = "DELETE FROM articles
          WHERE id_article = $id_article";

        $result = mysqli_query($link, $query);

        if (!$result)
            die(mysqli_error($link));

        return true;

    }

    // Короткое описание статьи
    public function articles_intro($article)
    {
        if (strlen($article['content']) > 80) {
            return substr($article['content'], 0, 80);
        } else {
            return $article['content'];
        }
    }
}