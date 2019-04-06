<?php

abstract class abstruct
{
    public $view;

    public function __construct($request)
    {
    }

    /*
     * @param array $request ビューに送るデータ
     * @return void
     *
     */  
    public function setRequest($request)
    {
        $this->view = $request;
    }

    /*
     * @param array $request ビューに送るデータ
     * @return mixed $view 
     * 
     */ 
    public function getRequest($request)
    {
        return $this->view;
    }
    
}

?>