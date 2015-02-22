<?php
// TODO класс для контроллера много повторяющегося кода
class Controller
{
    public function ConnectClass()
    {
        //Подключение классов
        include_once('m_article.class.php');
        include_once('m_template.class.php');
        include_once('m_connectDB.class.php');
        include_once('m_header.class.php');
    }

    public function ControllerConnectDB()
    {
        //Установка параметров, подключение к БД, запуск сессии
        $connectDB = new ConnectDB('localhost', 'root', 'root', 'news');
        return $connectDB;
    }
}

?>