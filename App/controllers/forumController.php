<?php
namespace App\Controllers;

use Classes\View;
use Classes\DataBase;
use App\Controllers\Controller;

class forumController extends Controller
{
    protected $view;

    public function __construct()
    {
        parent::__construct();
    }

    public function indexAction()
    {
        $connect = $this->bd();
        $fields = array('id_messages','user','message','message_time');
        $data = $connect->select('messages',$fields);
        $this->view->render('forum',compact('data'));
    }

    public function store(array $params){
        $connect = $this->bd();

        $store = $connect->insert('messages', $params);
        echo " Данные успешно добавлены ";
    }

    public function bd(){
        try{
            return DataBase::getInstance();
        }catch(Exception $e){
            $e->getMessage();
        }
    }
}