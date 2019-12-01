<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i"
          rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Shop</title>
</head>
<body>
<div class="container">
    <div>Хедер</div>
    <br>
    <hr>
    <div class="order-form">
        <div class="line-height">
            <p>
                <? if ($authentication) : ?>Добро пожаловать&#160;&#160;<span class="text-bold"><?= $username ?></span>
                &#160;&#160; > &#160;&#160;<a href="/auth/logout/">Выход</a>
            </p>
            <p>
                <? if ($isAdmin) : ?>
            <div><a href="/admin/">Перейти</a>&#160;&#160; < &#160;&#160; в панель администратора</div>
            <? endif; ?>
            <? else: ?>
                <form action="/auth/login/" method="post">
                    <input type="text" name="login" placeholder="логин">
                    <input type="password" name="pass" placeholder="пароль">
                    <input type="submit" value="Войти">
                </form>
            <? endif; ?>
            </p>
        </div>
        <div class="bread-crumbs-top">
            <a href="/">Каталог товаров</a>
        </div>
    </div>
    <hr>
    <div><?= $content; ?></div>
    <hr>
    <br>
    <div>футер</div>
</div>

<script src="/js/jsScript.js"></script>

</body>
</html>