<?php
namespace App\Controllers;

use Classes\View;

class forumController
{
    protected $view;

    /**
     * forumController constructor.
     * @param $view
     */
    public function __construct($view)
    {
        $this->view = new View();
    }

    public function show(){
        $this->view->render('forum',$data=[]);
    }

}