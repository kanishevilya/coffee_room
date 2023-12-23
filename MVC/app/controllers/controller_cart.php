<?php 
class Controller_Cart extends Controller{
    function __construct(){
        parent::__construct();
        $this->model=new Model_Cart();
    }
    
    function action_index(){ //default action
        $data=$this->model->getData("getAllProducts");
        $this->view->generate(
            "cart_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_getAllProducts(){ 
        $data=$this->model->getData("getAllProducts");
        $this->view->generate(
            "cart_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_getProducts(){ 
        $data=$this->model->getData("getProducts");
        $this->view->generate(
            "cart_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_addProduct(){ 
        $data=$this->model->getData("addProduct");
        $this->view->generate(
            "cart_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_removeProduct(){ 
        $data=$this->model->getData("removeProduct");
        $this->view->generate(
            "cart_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_clearCart(){ 
        $data=$this->model->getData("clearCart");
        $this->view->generate(
            "cart_view.php",
            "template_view.php", 
            $data
        );
    }
}