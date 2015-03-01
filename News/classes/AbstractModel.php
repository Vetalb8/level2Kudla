<?php

abstract class AbstractModel implements IModel {

    protected static $table;
    protected static $class;

    public static function getAll()
    {
        $db = new DB;
        $sql = 'SELECT * FROM ' . static::$table;
        return $db->queryAll($sql, static::$class);
    }

    public static function getOne($id)
    {
        $db = new DB;
        $sql = 'SELECT * FROM ' . static::$table . ' Where id =' . $id;
        return $db->queryOne($sql, static::$class);
    }

    public static function addNew($title, $text)
    {
        $db = new DB;
        $sql = "INSERT INTO " . static::$table . " (title, text)
                        VALUES ('$title', '$text')";

        return $db->queryNew($sql);
    }

    public static function updateNews($id, $title, $text)
    {
        //Проверка
        //if (!$id)
        //return false;
        //if ($title == '')
        //return false;

        $db = new DB;
        $sql = "UPDATE " . static::$table . " SET title = '$title', text = '$text'
                        WHERE id = '$id'";

        return $db->queryUpdate($sql);
    }
    
    public static function deleteNews($id)
    {
        $db = new DB;
        $sql = "DELETE FROM " . static::$table . " WHERE id = '$id'";
        
        return $db->queryDelete($sql);
    }

    public static function IsPost(){
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    public static function IsGet(){
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }
}