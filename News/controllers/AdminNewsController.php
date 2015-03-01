<?php

class AdminNewsController
{
    public function actionAll()
    {
        $items = News::getAll();
        include __DIR__ . '/../views/adminnews/all.php';
    }
}