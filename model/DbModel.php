<?php

namespace app\model;

use app\engine\Db;

/**
 * @var Db $db
 */

abstract class DbModel extends Models
{
    protected $db;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE idx = :id";
        return Db::getInstance()->queryObject($sql, [":id" => $id], static::class);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert()
    {
        $params = [];
        $colums = [];

        foreach ($this as $key => $value) {
            if ($key == "db" || $key == "idx") continue;
            $colums[] = "`$key`";
            $params[":{$key}"] = $value;
        }

        $colums = implode(", ", $colums);
        $value = implode(", ", array_keys($params));

        $tableName = static :: getTableName();
        $sql = "INSERT INTO `{$tableName}` ({$colums}) VALUES ({$value})";
        $this->db->execute($sql, $params);
        $this->idx = $this->db->lastInsertId();
    }

    public function delete()
    {
        $tableName = static ::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE idx = :id";
        return $this->db->execute($sql, [":id" => $this->idx]);
    }

    public function save()
    {
        if (is_null($this->idx))
            $this->insert();
        else
            $this->update();
    }

    public function update()
    {

    }

    abstract public static function getTableName();
}