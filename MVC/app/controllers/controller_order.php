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
    function action_getOrders(){
        $data=$this->model->getData("getOrders");
        $this->view->generate(
            "order_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_makeOrder(){
        $data=$this->model->getData("makeOrder");
        $this->view->generate(
            "order_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_addOrder(){
        $data=$this->model->getData("addOrder");
        $this->view->generate(
            "order_view.php",
            "template_view.php", 
            $data
        );
    }
}