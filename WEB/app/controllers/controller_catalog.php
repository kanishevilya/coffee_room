<?php 
class Controller_Catalog extends Controller{
    function __construct(){
        parent::__construct();
        $this->model=new Model_Catalog();
    }
    
    function action_index(){ //default action
        $data=$this->model->getData("getProducts");
        $this->view->generate(
            "catalog_view.php",
            "template_view.php", 
            $data
        );
    }

}