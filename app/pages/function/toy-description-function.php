<?php

function toyDescriptionRender(){
    global $mysqli;
    $html_title = 'Toys-R-Us';
    $arr_desc_toys = toyDescriptionGetAll();
    $arr_toy_stock = toyStockGetAll();
    $storesResults = listAll("stores", $mysqli);
    $brandsResults = ListAll("brands",$mysqli);
     /*-- Redirection sur la page error si la requete est pas bonne --*/
    if($arr_desc_toys && $arr_toy_stock && $storesResults && $brandsResults){
        require_once PATH_ROOT.'app'.DS.'pages'.DS.'partials'.DS.'top.html.php';
        require_once PATH_ROOT.'app'.DS.'pages'.DS.'toys-description.php';
        require_once PATH_ROOT.'app'.DS.'pages'.DS.'partials'.DS.'bottom.html.php';
    }else{
        header('location: /error');
    }
  
}

function toyDescriptionGetAll(){
    global $mysqli;

    $result = [];

    if(isset($_GET["toyId"])){
        $_SESSION["toyId"] = $_GET["toyId"];
    }

    $toyId = $_GET["toyId"];

    //Requête qui va chercher toute la table de toys et le stock total du jouer et le stock par magasin
    $q = "SELECT t.image, t.description, t.price, t.name AS toyname, brands.name as bname FROM toys AS t JOIN brands ON t.brand_id = brands.id WHERE t.id =?";

    if($stmt = mysqli_prepare($mysqli, $q)){
        $id = $toyId;
    
            mysqli_stmt_bind_param($stmt,'i',$id,);
    
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
    
            mysqli_stmt_close($stmt);
    
            while($toyDescription = mysqli_fetch_assoc($result)){
                $arr[] = $toyDescription;
            }
            return $arr;
        }
}

function toyStockGetAll(){
    global $mysqli;

    $result = [];
    $flag = false;
    if (isset($_POST["storesSelect"])) {

        if ($_POST['storesSelect'] != "") {

            //Requête qui va chercher le stock total du jouer 
            $q= "SELECT SUM(quantity) AS quantity FROM `stores` INNER JOIN `stock` ON store_id = stores.id WHERE toy_id =? AND store_id =?";
            $flag = true; 
            $idStore = $_POST["storesSelect"];
        } else {
            //Requete qui va chercher le stock par id du jouer par magasin
            $q= "SELECT SUM(quantity) AS quantity FROM stock WHERE toy_id =?";
        }
    } else {
        $q = "SELECT SUM(quantity) AS quantity FROM stock WHERE toy_id =?";
    }

    if($stmt = mysqli_prepare($mysqli, $q)){
       
        $id2 = $_GET["toyId"];
       
            if($flag){
                  mysqli_stmt_bind_param($stmt,'ii',$id2, $idStore);
            }else{
                mysqli_stmt_bind_param($stmt,'i', $id2);
            }
          
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);  
    
            mysqli_stmt_close($stmt);
    
            while($toyStock = mysqli_fetch_assoc($result)){
                $arr[] = $toyStock;
            }      
            return $arr;
        }
}