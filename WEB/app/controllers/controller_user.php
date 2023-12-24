<?php 
class Controller_User extends Controller{
    function __construct(){
        parent::__construct();
        $this->model=new Model_User();
    }
    
    function action_index(){ //default action
        $data=$this->model->getData("getUser");
        $this->view->generate(
            "user_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_registration(){
        $data=$this->model->getData("registration");
        $this->view->generate(
            "register_view.php",
            "template_view.php", 
            $data
        );
    }
    function action_authentication(){
        $data=$this->model->getData("authentication");
        $this->view->generate(
            "login_view.php",
            "template_view.php", 
            $data
        );
    }
}