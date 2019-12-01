<?php
/**
 * @var \app\model\Orders $orders
 */
?>
    <h2>Заказы</h2>
    <div class="row-product">
        <p class="row-product_flex">Номер заказа</p>
        <p class="row-product_flex row-product_center">Имя покупателя</p>
        <p class="row-product_flex row-product_center">Номер телефона</p>
        <p class="row-product_flex row-product_center">Адрес доставки</p>
        <p class="row-product_flex row-product_center">Статус заказа</p>
        <p class="row-product_flex row-product_right">Детали заказа</p>
    </div>
    <hr>
<?php foreach ($orders as $key => $value): $order = (object)$value; ?>
    <div class="row-product">
        <p class="row-product_flex row-product_center"><?= $order->idx ?></p>
        <p class="row-product_flex row-product_center"><?= $order->name ?></p>
        <p class="row-product_flex row-product_center"><?= $order->phone ?></p>
        <p class="row-product_flex row-product_center"><?= $order->address ?></p>
        <p class="row-product_flex row-product_center">
            <? if ($order->status == 1) : echo '<span class="color-status-red">В работе</span>'; endif ?>
            <? if ($order->status == 2) : echo '<span class="color-status-orange">Оплачен</span>'; endif ?>
            <? if ($order->status == 3) : echo '<span class="color-status-blue">Доставлен</span>'; endif ?>
            <? if ($order->status == 4) : echo '<span class="color-status-green">Обработан</span>'; endif ?>
        </p>
        <form action="/order/" method="post">
            <input type="text" hidden name="session" value="<?= $order->session ?>">
            <button type="submit" name="id" value="<?= $order->idx ?>" class="row-product_buttom">Подробнее</button>
        </form>
    </div>
<?php endforeach; ?>