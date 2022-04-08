<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app/pages/css/style.css">
    <title><?= $html_title ?></title>
</head>
<body>
<div class="container">
<header>
    <div class="container_header">
        <div class="logo">
            <a href="/">
            <img src="/_conception/media/toys-r-us-logo.png" alt="">
            </a>
        </div>
        <div class="navbar">
        <nav class="nav_div">
            <ul class="full_menu">
                <li><a href="/list" class="nav_link">Tous les jouets</a></li>
                <?php ?>
                <li class="menu"><a href="">Par marque</a> 
                    <ul class="sub_menu">
                        <?php foreach ($brandsResults as $k){ ?>
                            <li><a href="/list?marqueSelect=<?= $k["id"] ?>" class="brands_list" value="<?=$k['id'] ?>"><?= $k['name'] ?></a></li>
                        <?php }  ?>

                    </ul>

                </li>
            
            </ul>
        </nav>
        </div>
    </div>
</header>
    
