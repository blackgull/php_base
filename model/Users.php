<?php

namespace app\model;

use app\engine\Db;

class Users extends DbModel
{
    public $idx;
    public $login;
    public $password;

    /**
     * Users constructor.
     * @param $idx
     * @param $login
     * @param $password
     */
    public function __construct($idx = null, $login = null, $password = null)
    {
        parent::__construct();
        $this->idx = $idx;
        $this->login = $login;
        $this->password = $password;
    }

    public function authUser() {
        $sql = "SELECT * FROM users WHERE login = :login";
        $hash_pass = Db::getInstance()->queryOne($sql, ['login' => $this->login])['password'];
        if (password_verify($this->password, $hash_pass)) {
            $_SESSION['login'] = $this->login;
        }
    }

    public static function isAuth() {
        return isset($_SESSION['login']);
    }

    public static function getUser() {
        return $_SESSION['login'];
    }

    public static function isAdmin() {
        return $_SESSION['login'] == 'admin';
    }

    public static function getTableName()
    {
        return "users";
    }
}