<?php

function toyListeRender(){
    global $mysqli;
    $html_title = 'Les jouets';
    $array_toys = toyListeGetAall();
    $brandsResults = ListAll("brands",$mysqli);
     /*-- Redirection sur la page error si la requete est pas bonne --*/
    if ($array_toys && $brandsResults){
        require_once PATH_ROOT.'app'.DS.'pages'.DS.'partials'.DS.'top.html.php';
        require_once PATH_ROOT.'app'.DS.'pages'.DS.'toys-list.php';
        require_once PATH_ROOT.'app'.DS.'pages'.DS.'partials'.DS.'bottom.html.php';
    }else{
        header('location: /error');
    }
    
}

/*----- Function pour la page list  -----*/
function toyListeGetAall(){
 
    global $mysqli;

    $arr = [];
    /*--- Requéte qui appelle tous les jouer selon la marque ---*/
    $q ="SELECT `id`, `name`, `price`, `image` FROM toys WHERE brand_id =?  ";

    /*--- Requete preparé ---*/
    if (!empty($_GET['marqueSelect'])) {
    
        if($stmt = mysqli_prepare($mysqli, $q)){
            $id = $_GET['marqueSelect'];
        
                mysqli_stmt_bind_param($stmt,'i',$id,);
        
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
        
                mysqli_stmt_close($stmt);
        
                while($toy = mysqli_fetch_assoc($result)){
                    $arr[] = $toy;
                }
                
            }
        
    }
    else {
        /*--- Requéte qui appelle tous les jouer de la list ---*/
        $result = mysqli_query($mysqli,'SELECT `id`, `name`, `price`, `image` FROM toys;');

        while($row = mysqli_fetch_assoc($result)){
            $arr[] = $row;
        }

       
    }
    /*--- Function qui trie le tableau par ordre croissant ou décroissant ---*/
   if(!empty($_GET['order'])){

       if($_GET['order']=='1'){
   function orderCroissant($a,$b){
            return $a['price'] > $b['price'];
        }
        usort($arr,"orderCroissant");

       }else{
           function orderDecroissant($a,$b){
            return $a['price'] < $b['price'];
        }
        usort($arr,"orderDecroissant");
       }  
    }
    return $arr;
}
