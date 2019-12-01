<?php

namespace app\controllers;

use app\model\Products;
use app\model\Carts;
use app\engine\Request;

class ProductController extends Controller
{
    public function actionBuy()
    {
        (new Carts(null, (new Request())->getParams()['idProduct'], session_id()))->save();
        echo json_encode(['response' => 1, 'count' => Carts::getCount(session_id())], JSON_NUMERIC_CHECK);
    }

    public function actionCatalog()
    {
        $products = Products::getAll();
        echo json_encode(['goods' => $products], JSON_NUMERIC_CHECK);
    }

    public function actionIndex()
    {
        echo $this->render('catalog',
            [
                'products' => Products::getAll(),
                'count' => Carts::getCount(session_id())
            ]);
    }

    public function actionCard()
    {
        $product = Products::getOne($_GET['id']);
        if (!$product) {
            throw new \Exception('Продукт не найден', 404);
        };
        echo $this->render('card',
            [
                'product' => $product,
                'count' => Carts::getCount(session_id())
            ]);
    }
}