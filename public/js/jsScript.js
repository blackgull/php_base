$(document).ready(function () {
    //обработка добавления товара в корзину
    $(".action").on('click', function () {
        let idx = $(this).attr('data-idx');
        $.ajax({
            url: "/product/buy/",
            type: "POST",
            dataType: "json",
            data: {
                idProduct: idx,
            },
            error: function () {
                alert('error');
            },
            success: function (response) {
                $("#count").text(response.count);
            }
        })
    });

    //обработка удаления товара из корзины
    $(".delete").on('click', function () {
        let idx = $(this).attr('data-idx');
        console.log(idx);
        $.ajax({
            url: "/cart/delete/",
            type: "POST",
            dataType: "json",
            data: {
                idProduct: idx,
            },
            error: function () {
                alert('error');
            },
            success: function (response) {
                //$("#count").text(response.count);
                //$("#cost").text(response.cost);
                window.location.reload();
            }
        })
    });
});