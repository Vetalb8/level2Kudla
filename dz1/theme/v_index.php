<?/*
Шаблон редактируемой страницы
======================
$articles - список статей

статья:
id_article - идентификатор
title - заголовок
content - текст
*/?>
<ul>
    <li><a href="<?=$cNew?>">Создать новую статьью</a></li>
</ul>
<ol>
    <? foreach ($articles as $article): ?>
        <li>
            <a href="<?=$cArticle?>?id=<?= $article['id_article'] ?>">
                <?=$article['title']?>
            </a>
            <p><?=$article['content']?></p>
        </li>
        <p>--------------------------------------------------------------</p>
    <? endforeach ?>
</ol>
