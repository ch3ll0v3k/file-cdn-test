<?php

$path = $_SERVER["SCRIPT_FILENAME"];
file_put_contents("php://stdout", "\nRequested: $path");

if (preg_match('/\.(?:png|jpg|jpeg|gif|js|css)$/', $_SERVER["REQUEST_URI"])) {
  // сервер возвращает файлы напрямую.
  return false;
}

echo "<p>Добро пожаловать в PHP</p>";

