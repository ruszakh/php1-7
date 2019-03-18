<?php

require_once __DIR__ . '/../functions/checkUsers.php';

require_once __DIR__ . '/../classes/Uploader.php';

session_start();

$uploader = new Uploader('picture');

if (null === getCurrentUser()) {
    ?>Загрузка доступна только авторизованным пользователям
    <br>
    <a href="/login.php">Авторизация</a>
    <br>
    <a href="/gallery.php">Назад</a>
    <?php die;
}

if ((false === $uploader->isUploaded()) || (0 != $_FILES['picture']['error'])) {
    ?>Некорректный запрос<br>
    <a href="/gallery.php">Назад</a>
    <?php die;
}

if (
    'image/jpg' != $_FILES['picture']['type'] &&
    'image/jpeg' != $_FILES['picture']['type'] &&
    'image/png' != $_FILES['picture']['type']
) {
    ?>Некорректный формат файла<br>
    <a href="/gallery.php">Назад</a>
    <?php die;
}

$uploader->upload();

file_put_contents(__DIR__ . '/../logs.txt', $_SESSION['user'] . ' ' . date('Y-m-d H:i:s') . ' ' . $_FILES['picture']['name'] . "\n", FILE_APPEND);

header('Location: /gallery.php');

exit();