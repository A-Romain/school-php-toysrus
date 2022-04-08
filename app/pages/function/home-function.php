<?php

function homeRender()
{
    global $mysqli;
    $html_title = 'Toys-R-Us';
    $arr_toys_top = topToysGetAll();
    $brandsResults = ListAll("brands",$mysqli);
    require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'partials' . DS . 'top.html.php';
    require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'home.php';
    require_once PATH_ROOT . 'app' . DS . 'pages' . DS . 'partials' . DS . 'bottom.html.php';
}
/*----- function pour le top 3  ----- */
function topToysGetAll(): array
{
    global $mysqli;

    $array = [];
    /*---Requete sql pour le top 3---*/
    $q = 'SELECT SUM(quantity) AS total, s.toy_id,t.name, t.price,t.image FROM sales AS s INNER JOIN toys AS t ON s.toy_id=t.id GROUP BY s.toy_id ORDER BY total DESC, price DESC LIMIT 3;';

    $topToys_result = mysqli_query($mysqli, $q);
    if ($topToys_result) {
        if ($topToys_result) {
            while ($row = mysqli_fetch_assoc($topToys_result)) {
                $array[] = $row;
            }
        }
    }
    return $array;
}
