<?php

class DB
{
    public function __construct()
    {
        mysql_connect('localhost', 'root', 'root');
        mysql_select_db('news');

    }

    public function queryAll($sql, $class = 'stdClass' )
    {
        mysql_query("SET NAMES utf8");
        $res = mysql_query($sql);
        if (false === $res){
            return  false;
        }
        $ret=[];
        while($row = mysql_fetch_object($res, $class)){
            $ret[] = $row;
        }
        return $ret;
    }

    public function queryOne($sql, $class = 'stdClass')
    {
        return $this->queryAll($sql, $class)[0];
    }

    public function queryNew($sql)
    {
        mysql_query("SET NAMES utf8");

        $res = mysql_query($sql);

        if (false === $res){
            return  false;
        }
        return true;
    }

    public function queryUpdate($sql)
    {
        mysql_query("SET NAMES utf8");
        //echo "$sql";die();
        $res = mysql_query($sql);

        if (false === $res){
            return  false;
        }
        return true;
    }

    public function queryDelete($sql)
    {
        return $this->queryUpdate($sql);
    }
}