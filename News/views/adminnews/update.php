<h1>Изменение статьи</h1>
<form method="post">
    <label for="title">Название:</label><br>
    <input type="text" name="title" id="title" value="<?=$this->editTitle?>" size="60" placeholder="заголовок новости"/><br>
    <label for="text">Содержание:</label><br>
        <textarea name="text" id="text" cols="61" rows="20"><?=$this->editText?></textarea><br>
    <input type="hidden" name="id" value="<?=$item->id?>">
    <input type="submit" value="Обновить" name="submit"/>
    <input type="submit" value="Удалить" name="delete"/>
</form>