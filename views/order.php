<?php
/**
 * @var \app\model\Products $products
 */
?>
<a href="/admin/">Назад к заказам</a>
<h2>Детали заказа:</h2>
<?php $order = (object)$order; ?>
<p>Номер заказа:&#160;&#160;№<?= $order->idx ?></p>
<p>Имя покупателя:&#160;&#160;<?= $order->name ?></p>
<p>Номер телефона:&#160;&#160;<?= $order->phone ?></p>
<p>Адрес доставки:&#160;&#160;<?= $order->address ?></p>
<p>Статус заказа:&#160;&#160;
    <? if ($order->status == 1) : echo '<span class="color-status-red">В работе</span>'; endif ?>
    <? if ($order->status == 2) : echo '<span class="color-status-orange">Оплачен</span>'; endif ?>
    <? if ($order->status == 3) : echo '<span class="color-status-blue">Доставлен</span>'; endif ?>
    <? if ($order->status == 4) : echo '<span class="color-status-green">Обработан</span>'; endif ?>
</p>
<form action="" method="post">Изменить статус:&#160;&#160;
    <select name="status" id="">
        <option value="1">В работе</option>
        <option value="2">Оплачен</option>
        <option value="3">Доставлен</option>
        <option value="4">Обработан</option>
    </select>
    <input type="text" hidden name="id" value="<?= $order->idx ?>">
    <input type="text" hidden name="session" value="<?= $order->session ?>">
    <button type="submit">Изменить</button>
</form>
<hr>
<p>Всего товаров в корзине:&#160;&#160;<span id="count"><?= $count ?></span> шт.</p>
<p>На сумму:&#160;&#160;
    <span id="cost">
        <? if (!is_null($cost)) {
            echo $cost;
        } else {
            echo 0;
        } ?>
    </span> р.
</p>
<hr>
<?php foreach ($products as $key => $value): $product = (object)$value; ?>
    <div class="row-product">
        <p class="row-product_flex"><a href="/product/card/?id=<?= $product->id_product ?>"><?= $product->name ?></a>
        </p>
        <p class="row-product_flex"><?= $product->description ?></p>
        <p class="row-product_flex row-product_center"><?= $product->price ?></p>
        <img src="/img/<?= $product->image ?>" alt="" class="row-product_image">
    </div>
<? endforeach; ?>
