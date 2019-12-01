<?php
?>
<hr>
<div class="form-margin">
    <form action="/thank/" method="post" class="order-form">
        <input type="text" name="name" placeholder="имя">
        <input type="text" name="phone" placeholder="телефон">
        <input type="text" name="address" placeholder="адрес" class="field-address">
        <input type="text" hidden name="session" value="<?= session_id() ?>">
        <input type="text" hidden name="status" value="1">
        <button type="submit" class="order-button">Оформить заказ</button>
    </form>
</div>