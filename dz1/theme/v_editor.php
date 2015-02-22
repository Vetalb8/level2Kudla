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
