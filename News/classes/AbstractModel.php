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

    public function __isset($k)
    {
        return isset($this->data[$k]);
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

    public static function findByColumn($column, $value)
    {
        $db = new DB();
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
        $res = $db->query($sql, [':value' => $value ]);
        if(empty($res)){
            $e = new ModelException('Ничего не найдено...');
            throw $e;
        }
        return $res;
    }

    protected  function insert()
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

        $db = new DB();
        $db->execute('SET NAMES utf8');
        $db->execute($sql, $data);
        $this->id = $db->lastInsertId();
    }

    protected  function update()
    {
        $cols = [];
        $data = [];
        foreach ($this->data as $k => $v)
        {
            $data[':' . $k] = $v;
            if('id' == $k){
                continue;
            }
            $cols[] = $k . '=:' . $k;
        }

        $sql = '
                UPDATE ' . static::$table . '
                SET ' . implode(', ', $cols) . '
                WHERE id=:id
        ';

        $db = new DB();
        $db->execute('SET NAMES utf8');
        return $db->execute($sql, $data);
    }

    public function delete()
    {

        $cols = array_keys($this->data);
        $data = [];
        foreach ($cols as $col) {
            $data[':' . $col] = $this->data[$col];
        }

        $sql = "DELETE FROM " . static::$table . "
                WHERE " .implode($cols). "=" .implode(array_keys($data));

        $db = new DB();
        return $db->execute($sql, $data);
    }

    public function save()
    {
        if(!isset($this->id))
        {
            $this->insert();
        }else{
            $this->update();
        }
    }
}