<h1>Добавьте новую статью</h1>
<form method="post">
    <label for="title">Название:</label><br>
    <input type="text" name="title" id="title" value="<?=$newTitle?>" size="60" placeholder="заголовок новости"/><br>
    <label for="text">Содержание:</label><br>
    <textarea name="text" id="text" cols="61" rows="20"><?=$newText?></textarea><br>
    <input type="submit" value="Добавить" name="submit"/>
</form>