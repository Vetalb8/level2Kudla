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
        
        $view->item = $item;
        $view->display('news/one.php');
    }

    public function actionNew()
    {
        if(News::IsPost()){
            if(empty($_POST['title'])){
                $content = array( 'title' => '', 'text' => $_POST['text']);
                echo "Введите заголовок новости";
            }else{
                if(News::addNew($_POST['title'], $_POST['text'])){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                }
                $content = array( 'title' => $_POST['title'], 'text' => $_POST['text']);
            }
        }else{
            $content = array( 'title' => '', 'text' => '');
        }
        
        
        $view = new View();
        $view->content = $content;
        $view->display('adminnews/new.php');
    }

    public function actionUpdate()
    {
        if(News::IsGet()){
            $id = $_GET['id'];
            $item = News::getOne($id);
        }

        if(News::IsPost()){
            if(isset($_POST['submit'])){
                if(News::updateNews($_POST['id'], $_POST['title'], $_POST['text'])){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                    die();
                }
                $item->id = $_POST['id'];
                $item->title  = $_POST['title'];
                $item->text = $_POST['text'];
            }elseif(isset($_POST['delete'])) {
                if(News::deleteNews($_POST['id'])){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                    die();
                }
            }
        }
        $view = new View();
        $view->item = $item;
        $view->display('adminnews/update.php');
    }
}