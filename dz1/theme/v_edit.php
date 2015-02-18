<?/*
Шаблон редактируемой страницы
======================
$articles - список статей

статья:
id_article - идентификатор
title - заголовок
content - текст
*/?>
<h1>Изменение статьи</h1>
<form action="<?=$cEdit?>" method="post">
    <label for="title">Название:</label><br>
    <input type="text" name="title" id="title" value="<?=$title?>" size="60" placeholder="заголовок новости"/><br>
    <label for="content">Содержание:</label><br>
        <textarea name="content" id="content" cols="61" rows="20"><?=$content?></textarea><br>
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="submit" value="Обновить" name="submit"/>
    <input type="submit" value="Удалить" name="delete"/>
</form>
