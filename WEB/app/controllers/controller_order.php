<?php 
class Controller_Order extends Controller{
    function __construct(){
        parent::__construct();
        $this->model=new Model_Order();
    }
    
    function action_index(){ //default action
        $data=$this->model->getData("getOrders");
        $this->view->generate(
            "order_view.php",
            "template_view.php", 
            $data
        );
    }
}