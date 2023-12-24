<?php 
class Controller_Home extends Controller{
    function __construct(){
        parent::__construct();
        $this->model=new Model_Home();
    }
    
    function action_index(){ //default action
        // $data=$this->model->getData();
        $this->view->generate(
            "home_view.php",
            "template_view.php", 
            // $data
        );
    }

    function action_about(){
        // $data=$this->model->getData();
        $this->view->generate(
            "home_view.php",
            "template_view.php", 
            // $data
        );
    }
}