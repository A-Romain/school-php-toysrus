<?php
function toyMenuRender(){
    global $mysqli;
    $menu_toys = toyMenuGetAall();
    $brandsResults = ListAll("brands",$mysqli);
    /*-- Redirection sur la page error si la requete est pas bonne --*/
    if($menu_toys && $brandsResults){
        require_once PATH_ROOT.'app'.DS.'pages'.DS.'partials'.DS.'top.html.php';
    }else{
        header('location: /error');
    }
    
}

function toyMenuGetAall(){
    global $mysqli;

    $arr = [];

    if (isset($_GET['marqueSelect'])) {
        //Requête qui va chercher le jouer selon la marque 
        $q ="SELECT `id`, `name`, `price`, `image` FROM toys WHERE brand_id =?  ";
        
    } else {
        $result = mysqli_query($mysqli,'SELECT `id`, `name`, `price`, `image` FROM toys;');

        while($row = mysqli_fetch_assoc($result)){
            $arr[] = $row;
        }

        return $arr;
    }

    
   if($stmt = mysqli_prepare($mysqli, $q)){
    $id = $_GET['marqueSelect'];

        mysqli_stmt_bind_param($stmt,'i',$id,);

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        mysqli_stmt_close($stmt);

        while($toy = mysqli_fetch_assoc($result)){
            $arr[] = $toy;
        }
        return $arr;
    }
}
