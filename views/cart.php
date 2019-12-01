<?php
/**
 * @var \app\model\Products $products
 */
?>
<h2>Корзина</h2>
<p>Всего товаров в корзине:&#160;&#160;<span id="count"><?= $count ?></span> шт.</p>
<p>На сумму:&#160;&#160;
    <span id="cost">
        <? if (!is_null($cost)) {
            echo $cost;
        } else {
            echo 0;
        } ?></span> р.
</p>
<hr>
<?php foreach ($products as $key => $value): $product = (object)$value; ?>
    <div class="row-product">
        <p class="row-product_flex"><a href="/product/card/?id=<?= $product->id_product ?>"><?= $product->name ?></a>
        </p>
        <p class="row-product_flex"><?= $product->description ?></p>
        <p class="row-product_flex row-product_center"><?= $product->price ?></p>
        <img src="/img/<?= $product->image ?>" alt="" class="row-product_image">
        <button class="delete row-product_buttom" data-idx="<?= $product->id_cart ?>">Удалить</button>
    </div>
<? endforeach; ?>
<? if ($count != 0) : require_once 'formOrder.php'; endif ?>

