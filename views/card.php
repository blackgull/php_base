<?php
/**
 * @var \app\model\Products $product
 */
?>

<div class="cart-right">
    <a href="/cart/"">В корзине:&#160;<span id="count" class="text-bold"><?= $count ?></span></a>
</div>
<div class="container">
    <h2><?= $product->name ?></h2>
    <p>Описание: <?= $product->description ?></p>
    <p>Стоимость: <?= $product->price ?></p>
    <p>Картинка:</p><img src="/img/<?= $product->image ?>" alt="" class="box-image">
</div>
<button class="action" data-idx="<?= $product->idx ?>">Купить</button>
