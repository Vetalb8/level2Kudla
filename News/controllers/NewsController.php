<?php

class NewsController
{
    public function actionAll()
    {
        $news = News::getAll();
        $view = new View();

        //$view->assign('items', $news);
        $view->items = $news;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = News::getOne($id);
        $view = new View();
        
        $view->assign('item', $item);
        $view->display('news/one.php');
    }

    public function actionNew()
    {
        if(News::IsPost()){
            if(empty($_POST['title'])){
                $newText = $_POST['text'];
                echo "Введите заголовок новости";
            }else{
                if(News::addNew($_POST['title'], $_POST['text'])){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                }
                $newTitle = $_POST['title'];
                $newText = $_POST['text'];
            }
        }else{
            $newTitle = '';
            $newText = '';
        }

        include __DIR__ . '/../views/adminnews/new.php';
    }

    public function actionUpdate()
    {
        if(News::IsGet()){
            $id = $_GET['id'];
            $item = News::getOne($id);

            $editId = $item->id;
            $editTitle = $item->title;
            $editText = $item->text;
        }

        if(News::IsPost()){
            if(isset($_POST['submit'])){
                if(News::updateNews($_POST['id'], $_POST['title'], $_POST['text'])){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                    die();
                }
                $editId = $_POST['id'];
                $editTitle = $_POST['title'];
                $editText = $_POST['text'];
            }elseif(isset($_POST['delete'])) {
                if(News::deleteNews($_POST['id'])){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                    die();
                }
            }
        }
        include __DIR__ . '/../views/adminnews/update.php';
    }
}