<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

include_once('collector.php');
$Collector = new Collector();
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8"/>
    <title>Collector.php test</title>

    <?=( $Collector->js('jquery','3.3.1',true) );?>
    <?=( $Collector->js('popper','1.14.7',true) );?>
    <?=( $Collector->js('bootstrap','4.3.1',true) );?>
    <?=( $Collector->css('bootstrap','4.3.1') );?>
    <?=( $Collector->js('less','2.7.2') );?>

  </head>
  
  <body>

  </body>

</html>
