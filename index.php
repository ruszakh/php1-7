<?php

include __DIR__ . '/functions/checkUsers.php';

session_start();

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP 1-6</title>
</head>
<body>
    <?php

    if (null === getCurrentUser()) {
        ?><a href="/login.php">Вход</a><?php
    } else {
        ?>Вы вошли, как <?php echo $_SESSION['user'];?>
        <br>
        <form method="post" action="/logout.php">
            <button type="submit">Выйти</button>
        </form><?php } ?>
    <br>
    <a href="/book.php">Гостевая книга</a>
    <br>
    <a href="/gallery.php">Галерея</a>
</body>
</html>