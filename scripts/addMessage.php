<?php

session_start();

require_once __DIR__ . '/../classes/GuestBook.php';

$book = new GuestBook(__DIR__ . '/../records.txt');

$book->append($_POST['message'])->save();

header('Location: /book.php');

exit();