<?php

class AdminNews extends AbstractModel
{
    public $id;
    public $title;
    public $text;
    
    protected static $table = 'news';
    protected static $class = 'News';
}