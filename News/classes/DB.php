<?php

class DB
{
    private $dbh;

    private $className = 'stdClass';

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function __construct()
    {
        // создаем объект ПДО связь с БД
        $this->dbh = new PDO('mysql:dbname=news;host=localhost', 'root', 'root');
    }

    public function query($sql, $params = [])
    {
        // подгатавливаем запрос
        $sth = $this->dbh->prepare($sql);
        // выполнить запрос с указ параметрами
        $sth->execute($params);
        // получаем все строки с указанного запроса
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params = [])
    {
        // подгатавливаем запрос
        $sth = $this->dbh->prepare($sql);
        // выполнить запрос с указ параметрами
        return $sth->execute($params);
        // получаем все строки с указанного запроса

    }
}