<main>
<h1>Top 3 des Ventes</h1>
<div class="cards_toys">
    <ul class="cards_list">
        <?php foreach ($arr_toys_top as $array): ?>
        <li>
        <a class="cards-title" href="/toy?toyId=<?= $array["toy_id"] ?>"><?= $array["name"] ?></a>
            <img src="/_conception/media/<?= $array['image'] ?>" alt="">
            <p class="price"><?= $array['price'] ?>€</p>
        </li>
        <?php endforeach ?>
    </ul>
</div>