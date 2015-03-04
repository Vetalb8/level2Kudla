<?php

class NewsController
{
    public function actionAll()
    {
        $news = NewsModel::findAll();
        $view = new View();

        //$view->assign('items', $news);
        $view->items = $news;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        $id = $_GET['id'];
        $item = NewsModel::findOneByPk($id);
        $view = new View();

        $view->item = $item;
        $view->display('news/one.php');
    }

    public function actionNew()
    {
        $article = new NewsModel();

        if(NewsModel::IsPost()){
            $article->title = $_POST['title'];
            $article->text = $_POST['text'];
            if(empty($article->title)){
                $content = array( "$article->title" => '', "$article->text" => $_POST['text']);
                echo "Введите заголовок новости";
            }else{
                if(NewsModel::insert($_POST['title'], $_POST['text'])){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                }
                $content = array( 'title' => $_POST['title'], 'text' => $_POST['text']);
            }
        }else{
            $content = array( 'title' => "", 'text' => "");
        }

        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        die();

        $view = new View();
        $view->content = $content;
        $view->display('adminnews/new.php');
    }

    public function actionUpdate()
    {
        if(NewsModel::IsGet()){
            $id = $_GET['id'];
            $item = NewsModel::findOneByPk($id);
        }

        if(NewsModel::IsPost()){
            if(isset($_POST['submit'])){
                if(NewsModel::update($_POST['id'], $_POST['title'], $_POST['text'])){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                    die();
                }
                $item->id = $_POST['id'];
                $item->title  = $_POST['title'];
                $item->text = $_POST['text'];
            }elseif(isset($_POST['delete'])) {
                if(NewsModel::delete($_POST['id'])){
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