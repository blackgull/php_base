<?php

namespace app\model;

use app\engine\Db;

class Carts extends DbModel
{
    public $idx;
    public $idProduct;
    public $session;

    /**
     * Carts constructor.
     * @param $idx
     * @param $idProduct
     * @param $session
     */
    public function __construct($idx = null, $idProduct = null, $session = null)
    {
        parent::__construct();
        $this->idx = $idx;
        $this->idProduct = $idProduct;
        $this->session = $session;
    }

    // получить корзину по текущей сесии
    public static function getCart($session)
    {
        $sql = "SELECT `products`.`idx` AS id_product, `carts`.`idx` AS id_cart, `products`.`name`, `products`.`description`, `products`.`price`, `products`.`image`  FROM `carts`, `products` WHERE `products`.`idx` = `carts`.`idProduct` AND `session` = :session";
        return Db::getInstance()->queryAll($sql, ['session' => $session]);
    }

    // получить количество товаров в корзине
    public static function getCount($session)
    {
        $sql = "SELECT count(*) as count FROM `carts` WHERE `session` = :session";
        return Db::getInstance()->queryOne($sql, ['session' => $session])['count'];
    }

    // получить общую стоимость товаров в корзине
    public static function getCostCart($session)
    {
        $sql = "SELECT SUM(`price`) FROM `carts`, `products` WHERE `products`.`idx` = `carts`.`idProduct` AND `session` = :session";
        return Db::getInstance()->queryOne($sql, ['session' => $session])['SUM(`price`)'];
    }

    public static function getTableName()
    {
        return "carts";
    }
}