<?php

define('DS',DIRECTORY_SEPARATOR);
define('PATH_ROOT',__DIR__.DIRECTORY_SEPARATOR);

session_start();

$mysqli = mysqli_connect('database','root','','toys-r-us');

require_once PATH_ROOT.'app'.DS.'pages'.DS.'function'.DS.'function.php';
require_once PATH_ROOT.'app'.DS.'router.php';

routerStart();

mysqli_close($mysqli);