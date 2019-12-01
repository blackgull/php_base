<?php

namespace app\controllers;

use app\model\Orders;

class AdminController extends Controller
{
    public function actionIndex()
    {
        echo $this->render('admin',
            [
                'orders' => (new Orders())->getAll()
            ]);
    }
}