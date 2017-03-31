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
        $fields = array('date','id_customer','id_delivery');
        $data = $connect->select('booking',$fields);
        $this->view->render('forum',compact('data'));
    }

    public function store(array $params){
        $connect = $this->bd();

        $store = $connect->insert('messages', $params);
        echo " Данные успешно добавлены ";
    }

    public function bd(){
        return parent::bd();
    }
}