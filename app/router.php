<?php
function routerStart(): void
{
    $route = $_SERVER['REDIRECT_URL'] ?? '/';

    switch($route){
        case '/';
        require_once PATH_ROOT.'app'.DS.'pages'.DS.'function'.DS.'home-function.php';
        homeRender();
            break;

        case '/list';
        require_once PATH_ROOT.'app'.DS.'pages'.DS.'function'.DS.'toy-list-function.php';
        toyListeRender();
        break;

        case '/toy';
        require_once PATH_ROOT.'app'.DS.'pages'.DS.'function'.DS.'toy-description-function.php';
        toyDescriptionRender();
        break;

        default:
        http_response_code(404);
        require_once PATH_ROOT.'app'.DS.'pages'.DS.'function'.DS.'x404error_function.php';
        // echo '404 - Not Found - Tkt pas ça va bien se passer !';
        Error();
        break;
    }
}