<?php
class ConnectDB{
    public $localhost;
    public $username;
    public $password;
    public $dbName;
    public $link;

    function __construct($localhost, $username, $password, $dbName){

        $this->localhost = $localhost;
        $this->username = $username;
        $this->password = $password;
        $this->dbName = $dbName;

        //Языковая настройка
        setlocale(LC_ALL, 'ru_RU.utf8');

        date_default_timezone_set('Europe/Moscow');

        //Подключение к БД
        $this->link = mysqli_connect($localhost, $username, $password, $dbName)
        or die('Ошибка к подключению базы данных');

        mysqli_query($this->link, "SET NAMES utf8");

        //Открытие сессии
        session_start();
    }
}
?>