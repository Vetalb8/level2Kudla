<a href="index.php?ctrl=AdminNews&act=New">Создать новую статью</a>
<a href="index.php?ctrl=News&act=All">Выйти из режима администратор</a>
<?php foreach ($items as $item): ?>
    <h1><a href="index.php?ctrl=AdminNews&act=Update&id=<?php echo $item->id; ?>" ><?php echo $item->title; ?></a></h1>
    <div><?=$item->text?></div>
<?php endforeach?>
