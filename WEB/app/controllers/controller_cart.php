<?php 
class Controller_Cart extends Controller{
    function __construct(){
        parent::__construct();
        $this->model=new Model_Cart();
    }
    
    function action_index(){ //default action
        // $data=$this->model->getData("getProducts");
        $this->view->generate(
            "cart_view.php",
            "template_view.php", 
            // $data
        );
    }
}