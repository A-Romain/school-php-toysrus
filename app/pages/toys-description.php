<form action="" method="POST" class="form_description">
<?php foreach ($arr_desc_toys as $toyDescription): ?>
    <div class="title">
            <?= $toyDescription['toyname'] ?>
        </div>
<div class="toy_description">
    <div class="desc_left">   
        <img class= "img_desc" src="/_conception/media/<?= $toyDescription['image'] ?>" alt="">
        <p class="price"><?= $toyDescription['price'] ?>€</p>
        <div class="store_toy">
            <select name="storesSelect" id="storesSelect">
                <option value="">Quel magasin ?</option>
                <?php 
                foreach ($storesResults as $k ) { 
                    var_dump($k['id']);
                ?>
                    <option value="<?=$k['id'] ?>"><?= $k['name'] ?></option>
                <?php
                }
                ?>
            </select>
            <input type="hidden" />
            <input type="submit" value="ok" />
        </div>
        <div class="stock_toy">
            <?php foreach ($arr_toy_stock as $toyStock): ?>
            <p class="stock">Stock: <span><?= $toyStock['quantity'] ?></span> </p>
            <?php  endforeach ?>
        </div>
    </div>
    <div class="desc_right">
         <div class="brand">
             <p class="brands">Marque: <span><?= $toyDescription['bname'] ?></span></p>
         </div>   
         <div>
             <p class="description"><?= $toyDescription['description'] ?></p>
         </div>
    </div>
</div>
<?php endforeach ?>
</form>