<?php
/**
 * @var \app\model\Products $product
 */
?>
<div class="bread-crumbs">
    <h2>Каталог</h2>
    <a href="/cart/" class="cart-right">В корзине:&#160;<span id="count" class="text-bold"><?= $count ?></span></a>
</div>

<?php foreach ($products as $key => $value): $product = (object)$value; ?>
    <div class="row-product">
        <p class="row-product_flex"><a href="/product/card/?id=<?= $product->idx ?>"><?= $product->name ?></a></p>
        <p class="row-product_flex"><?= $product->description ?></p>
        <p class="row-product_flex row-product_center"><?= $product->price ?></p>
        <img src="/img/<?= $product->image ?>" alt="" class="row-product_image">
        <button class="action row-product_buttom" data-idx="<?= $product->idx ?>">Купить</button>
    </div>
<? endforeach; ?>












