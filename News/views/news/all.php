<a href="index.php?ctrl=AdminNews&act=All">Режим администратора</a>
<?php foreach ($items as $item): ?>
    <h1><a href="index.php?ctrl=News&act=One&id=<?php echo $item->id; ?>" ><?php echo $item->title; ?></a></h1>
    <div><?=$item->text?></div>
<?php endforeach?>
