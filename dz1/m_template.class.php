<?php
class Template
{
    //Подключение шаблона
    function view_include($fileName, $vars)
    {
        //Установка переменных для шаблона
        foreach ($vars as $name => $value) {
            $$name = $value;
        }

        //Генерация HTML в строку
        ob_start();
        include $fileName;
        return ob_get_clean();
    }
    //Показать шаблон
    function showTamplate($page){
        echo $page;
    }
}
?>