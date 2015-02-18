
<h1>Новая статья</h1>
<form action="<?=$cNew?>" method="post">
    <label for="title">Название:</label><br>
    <input type="text" name="title" id="title" value="<?=$title?>" size="60" placeholder="заголовок новости"/><br>
    <label for="content">Содержание:</label><br>
    <textarea name="content" id="content" cols="61" rows="20"><?=$content?></textarea><br>
    <input type="submit" value="Добавить" name="submit"/>
</form>
