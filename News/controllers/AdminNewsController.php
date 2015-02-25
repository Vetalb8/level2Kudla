<?php

class AdminNewsController
{
    public $newTitle; // заголовок
    public $newText;  //содержание
    public $editId; //
    public $editTitle;  //
    public $editText;  //

	public function actionNew()
    {
        if(AdminNews::IsPost()){
            if(empty($_POST['title'])){
                $this->newText = $_POST['text'];
                echo "Введите заголовок новости";
            }else{
                if(AdminNews::addNew($_POST['title'], $_POST['text'])){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                }
                $this->newTitle = $_POST['title'];
                $this->newText = $_POST['text'];
            }
        }else{
            $this->newTitle = '';
            $this->newText = '';
        }
        include __DIR__ . '/../views/adminnews/new.php';
    }

    public function actionUpdate()
    {   
        if(AdminNews::IsGet()){
            $id = $_GET['id'];
            $item = AdminNews::getOne($id);

            $this->editId = $item->id;
            $this->editTitle = $item->title;
            $this->editText = $item->text;
        }
        
        if(AdminNews::IsPost()){
            if(isset($_POST['submit'])){
                if(AdminNews::updateNews($_POST['id'], $_POST['title'], $_POST['text'])){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                    die();
                }
                $this->editId = $_POST['id'];
                $this->editTitle = $_POST['title'];
                $this->editText = $_POST['text'];
            }elseif(isset($_POST['delete'])) {
                if(AdminNews::deleteNews($_POST['id'])){
                    header('Location: index.php?ctrl=AdminNews&act=All');
                    die();
                }
            }
        }
        include __DIR__ . '/../views/adminnews/update.php';
    }

    public function actionAll()
    {
        $items = AdminNews::getAll();
        include __DIR__ . '/../views/adminnews/all.php';
    }
}