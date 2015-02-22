<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="../theme/style.css"/>
</head>
<body>
<h1><?=$title?></h1>
<? if($active_item == 'index'): ?>
    <b>Главная</b>
    <a href="c_editor.php">Консоль редакторв</a>
<?elseif($active_item == 'editor'):?>
    <a href="c_index.php">Главная</a>
    <b>Консоль редакторв</b>
<?else:?>
    <a href="c_index.php">Главная</a>
    <a href="c_editor.php">Консоль редакторв</a>
<?endif?>
<hr>
<?=$content?>
<hr>
<small><a href="#">Kudla Vitaliy</a></small>
</body>
</html>