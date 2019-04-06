<?php

class top_view_index {

    private $view;

    public function __construct($view)
    {
        $this->view = $view;
        dx($view);
    }

}

?>