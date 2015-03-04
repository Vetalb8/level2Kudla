<?php

class NewsController
{
    public function actionAll()
    {
        $news = NewsModel::findAll();
        $view = new View();
        $view->items = $news;
        $view->display('news/all.php');
    }

    public function actionOne()
    {
        /*
        $article = new NewsModel();
        $column = 'title';
        $value = 'Hello';
        $item = NewsModel::findByColumn($column, $value);
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');
        */

        

        $id = $_GET['id'];
        $item = NewsModel::findOneByPk($id);
        $view = new View();
        $view->item = $item;
        $view->display('news/one.php');


    }

    public function actionNew()
    {
        $article = new NewsModel();

        if($article->IsPost()){
            if(empty($_POST['title'])){
                $article->title = '';
                $article->text = $_POST['text'];
                echo "Введите заголовок новости";
            }else{
                $article->title = $_POST['title'];
                $article->text = $_POST['text'];
                if($article->insert()){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                }
            }
        }else{
            $article->title = '';
            $article->text = '';
        }
        
        $view = new View();
        $view->article = $article;
        $view->display('adminnews/new.php');
    }

    public function actionUpdate()
    {
        $article = new NewsModel();
        
        if($article->IsGet()){
            $article->id = $_GET['id'];
            $article = NewsModel::findOneByPk($article->id);
        }

        if($article->IsPost()){
            if(isset($_POST['submit'])){
                $article->id = $_POST['id'];
                $article->title = $_POST['title'];
                $article->text = $_POST['text'];
                
                if($article->update()){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                    die();
                }
            }elseif(isset($_POST['delete'])) {
                $article->id = $_POST['id'];
                if($article->delete()){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                    die();
                }
            }
        }
        $view = new View();
        $view->article = $article;
        $view->display('adminnews/update.php');
    }
}