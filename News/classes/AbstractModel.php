<?php

abstract class AbstractModel
{
    static protected $table;

    protected $data = [];

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new DB();
        $db->setClassName($class);
        $db->query('SET NAMES utf8');
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new DB();
        $db->setClassName($class);
        $db->query('SET NAMES utf8');
        return $db->query($sql, [':id' => $id ])[0];
    }

    public function insert()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }

        $sql = '
            INSERT INTO ' . static::$table . ' 
            (' . implode(', ', $cols). ') 
            VALUES 
            (' . implode(', ', array_keys($data)). ')
            ';

        echo "$sql";die();
        /*
        echo "<pre>";
        var_dump($data);
        die();
        echo "</pre>";
        */

        $db = new DB();
        $db->execute($sql, $data);
    }

    public function update()
    {
        $cols = array_keys($this->data);
        $data = [];

        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }


        $sql = "UPDATE " . static::$table . " 
                SET title = :title, text = :text
                WHERE id = :id";

        $db = new DB();
        $db->execute($sql, $data);
    }

    public function delete()
    {
        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }

        $sql = "DELETE FROM " . static::$table . "
                WHERE id = :id";

        $db = new DB();
        $db->execute($sql, $data);
    }

    public static function IsPost(){
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    public static function IsGet(){
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }
}