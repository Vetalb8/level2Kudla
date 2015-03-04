<?php

class AdminNewsController
{
    public function actionAll()
    {
        $items = NewsModel::findAll();
        include __DIR__ . '/../views/adminnews/all.php';
    }
}