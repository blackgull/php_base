<?php

namespace app\controllers;

use app\engine\Request;
use app\model\Orders;

class ThankController extends Controller
{
    public function actionIndex()
    {
        $session = (new Request())->getParams()['session'];
        $name = (new Request())->getParams()['name'];
        $address = (new Request())->getParams()['address'];
        $phone = (new Request())->getParams()['phone'];
        $status = (new Request())->getParams()['status'];

        (new Orders(null, $session, $status, $name, $phone, $address))->save();

        echo $this->render('thank',
            [
                'order' => (new Orders())->getOrder($session)
            ]);
    }
}