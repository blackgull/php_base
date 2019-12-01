<?php

namespace app\controllers;

use app\engine\Request;
use app\model\Carts;

class CartController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('cart',
            [
                'products' => Carts::getCart(session_id()),
                'count' => Carts::getCount(session_id()),
                'cost' => Carts::getCostCart(session_id())
            ]);
    }

    public function actionDelete()
    {
        $cart = Carts::getOne((new Request())->getParams()['idProduct']);
        if (session_id() == $cart->session) {
            $cart->delete(session_id());
        }
        echo json_encode(['response' => 1, 'count' => Carts::getCount(session_id()), 'cost' => Carts::getCostCart(session_id())],JSON_NUMERIC_CHECK);
    }
}