<?php

namespace app\controllers;

use app\model\Orders;
use app\model\Carts;
use app\engine\Request;

class OrderController extends Controller
{
    public function actionIndex()
    {
        $session = (new Request())->getParams()['session'];
        $id = (new Request())->getParams()['id'];
        $status = (new Request())->getParams()['status'];

        if (!is_null($status)) {
            (new Orders())->addUpdate($id, $status);
        }

        echo $this->render('order',
            [
                'order' => (new Orders())->getOne($id),
                'products' => Carts::getCart($session),
                'count' => Carts::getCount($session),
                'cost' => Carts::getCostCart($session)
            ]);
    }
}