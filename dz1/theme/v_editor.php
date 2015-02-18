<?/*
Шаблон редактируемой страницы
======================
$articles - список статей

статья:
id_article - идентификатор
title - заголовок
content - текст
*/?>
<ol>
    <? foreach ($articles as $article): ?>
        <li>
            <a href="<?=$cEdit?>?id=<?= $article['id_article'] ?>">
                <?=$article['title']?>
            </a>
        </li>
        <p>--------------------</p>
    <? endforeach ?>
</ol>
