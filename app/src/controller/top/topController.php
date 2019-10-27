<?php

class topController extends commonController
{

    public function __construct()
    {
    }

    public function index()
    {
        $request = [
            [
                'name'          => 'Notebook',
                'description'   => 'Core i7',
                'value'         =>  800.00,
                'date_register' => '2017-06-22',
            ],
            [
                'name'          => 'Mouse',
                'description'   => 'Razer',
                'value'         =>  125.00,
                'date_register' => '2017-10-25',
            ],
            [
                'name'          => 'Keyboard',
                'description'   => 'Mechanical Keyboard',
                'value'         =>  250.00,
                'date_register' => '2017-06-23',
            ],
        ];

        $this->view('top/index', [
            'products' => $request,
        ]);
    }

    public function list()
    {
        dx('トップの一覧ページ');
    }
}

?>