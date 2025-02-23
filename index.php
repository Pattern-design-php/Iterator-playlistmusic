<?php
require __DIR__ . '/autoload.php';
session_start();
$list_music = include 'src/view/list_music/index.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="src/style/index.css">
</head>

<body>
    <?php $list_music ?>
</body>

</html>