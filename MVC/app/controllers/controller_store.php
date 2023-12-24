<?php 
class Controller_Store extends Controller{
    function __construct(){
        parent::__construct();
        $this->model=new Model_Store();
    }
    
    function action_index(){ //default action
        $data=$this->model->getData("getAllProducts");
        $this->view->generate(
            "store_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_getAllBaseProducts(){
        $data=$this->model->getData("getAllProducts");
        $this->view->generate(
            "store_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_getBaseProduct(){
        $data=$this->model->getData("getProduct");
        $this->view->generate(
            "store_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_getFullProduct(){
        $data=$this->model->getData("getFullProduct");
        $this->view->generate(
            "store_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_getAllFullProducts(){
        $data=$this->model->getData("getAllFullProducts");
        $this->view->generate(
            "store_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_getProductsByPrice(){
        $data=$this->model->getData("getProductsByPrice");
        $this->view->generate(
            "store_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_getProductsByName(){
        $data=$this->model->getData("getProductsByName");
        $this->view->generate(
            "store_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_getAllAllergens(){
        $data=$this->model->getData("getAllAllergens");
        $this->view->generate(
            "store_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_getAllAdditions(){
        $data=$this->model->getData("getAllAdditions");
        $this->view->generate(
            "store_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_getProductsByFilter(){
        $data=$this->model->getData("getProductsByFilter");
        $this->view->generate(
            "store_view.php",
            "template_view.php", 
            $data
        );
    }
}