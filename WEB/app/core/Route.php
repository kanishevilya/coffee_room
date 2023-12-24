<?php
class Route{
    static function start(){
        $uri = strtok($_SERVER["REQUEST_URI"], "?");
        $routers=explode("/", $uri);
        $controller_name=(empty($routers[4]) ||$routers[4]=="" )?"Home":$routers[4]; //for ex "Ilya/dec5/Product/"
        $action_name=(!empty($routers[5]))? $routers[5]:"index";   //for ex "Ilya/dec5/Product/index.php?action=..."
        
        
        $model_name="Model_$controller_name";
        $controller_name="Controller_$controller_name";
        $action_name="Action_$action_name";
        $model_file=strtolower($model_name).".php";
        $model_path="app/models/$model_file";
        if(file_exists($model_path)){include ($model_path);}


        $controller_file=strtolower($controller_name).".php";
        $controller_path="app/controllers/$controller_file";


        if(file_exists($controller_path)){include $controller_path;}
        else {Route::NotFound();}
        
        $controller= new $controller_name;
        $action=$action_name;
        if(method_exists($controller, $action)){$controller->$action();}
        else {Route::NotFound();}


    }
    static function NotFound(){
        $host= "http://". $_SERVER["HTTP_HOST"];
        header("HTTP/1.1 404 Not Found");
        header("Status: 404 Not Found");
        header("Location: $host/404");
    }
}