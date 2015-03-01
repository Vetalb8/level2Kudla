<?php

interface IModel
{
    public static function getAll();
    public static function getOne($id);
    public static function addNew($title, $text);
    public static function updateNews($id, $title, $text);
    public static function IsPost();
    public static function IsGet();
}