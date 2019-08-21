<?php

$path = $_SERVER["SCRIPT_FILENAME"];

function console( $data ){
  file_put_contents("php://stdout", "$data\n");
}

if (preg_match('/\.(?:png|jpg|jpeg|gif|js|css)$/', $_SERVER["REQUEST_URI"])) {
  // сервер возвращает файлы напрямую.
  return false;
}

// $indexFiles = ['index.html', 'index.php'];
// $routes = [
//   '^/api(/.*)?$' => '/index.php'
// ];
// $requestedAbsoluteFile = dirname(__FILE__) . $_SERVER['REQUEST_URI'];
// foreach ($routes as $regex => $fn){
//   if (preg_match('%'.$regex.'%', $_SERVER['REQUEST_URI'])){
//     $requestedAbsoluteFilec = dirname(__FILE__) . $fn;
//     break;
//   }
// }
// console( $requestedAbsoluteFilec );



echo "<p>Добро пожаловать в PHP</p>";

