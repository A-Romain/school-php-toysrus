<?php
function Error(){
    global $mysqli;
    $brandsResults = ListAll("brands",$mysqli);
    require_once PATH_ROOT.'app'.DS.'pages'.DS.'partials'.DS.'top.html.php';
    require_once PATH_ROOT.'app'.DS.'pages'.DS.'x404error.php';
    require_once PATH_ROOT.'app'.DS.'pages'.DS.'partials'.DS.'bottom.html.php';
}