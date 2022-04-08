<h1>Les jouets</h1>

<form action="" method="get" class="d-flex flex-column justify-content-center align-items-center">
<div class="marque">
    <select name="marqueSelect" id="marqueSelect">
        <option value="">Quelle marque ?</option>
        <?php
        foreach ($brandsResults as $k => $v) {
        ?>
        <option value="<?= $brandsResults[$k]['id'] ?>"><?= $brandsResults[$k]['name'] ?></option>
        <?php
        }
        ?>
    </select>
    <select name="order" id="">
        <option value="1">Croissant</option>
        <option value="2">Décroissant</option>
    </select> 
    <input type="hidden" />
    <input type="submit" value="ok" />
    
</div>
</form>

<div class="cards_toys">
    <ul class="cards_list">
        <?php foreach($array_toys as $toy):
?>
        <li>
            <?php  ?>
        <a class="cards-title" href="/toy?toyId=<?= $toy["id"] ?>"><?= $toy["name"] ?></a>
            <img src="/_conception/media/<?= $toy['image'] ?>" alt="" >
            <p class="price"><?= $toy['price'] ?>€</p>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
