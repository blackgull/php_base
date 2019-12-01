<?php

namespace app\model;

use app\engine\Db;

class Orders extends DbModel
{
    public $idx;
    public $session;
    public $status;
    public $name;
    public $phone;
    public $address;

    /**
     * Orders constructor.
     * @param $idx
     * @param $session
     * @param $status
     * @param $name
     * @param $phone
     * @param $address
     */
    public function __construct($idx = null, $session = null, $status = null, $name = null, $phone = null, $address = null)
    {
        parent::__construct();
        $this->idx = $idx;
        $this->session = $session;
        $this->status = $status;
        $this->name = $name;
        $this->phone = $phone;
        $this->address = $address;
    }

    public static function getOrder($session) {
        $sql = "SELECT * FROM orders WHERE session = :session";
        return Db::getInstance()->queryOne($sql, ['session' => $session]);
    }

    public static function addUpdate($id, $status) {
        $sql = "UPDATE `orders` SET `status` = :status WHERE `orders`.`idx` = :id";
        return Db::getInstance()->queryOne($sql,
            [
                'id' => $id,
                'status' => $status
            ]);
    }

    public static function getTableName()
    {
        return "orders";
    }
}