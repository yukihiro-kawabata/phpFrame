<?php

class topController extends commonController
{

    public function __construct()
    {
    }

    public function index()
    {
        $this->view->array = array('a','b','c','d');
        $this->view->string = 'foo';

        new top_view_index($this->view);
        return view('index');
    }

    public function list()
    {
        dx('トップの一覧ページ');
    }
}

?>