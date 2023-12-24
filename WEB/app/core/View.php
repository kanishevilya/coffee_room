<?php
class View{
    private function getLanguage(){
        $lang= isset($_GET["lang"]) ? $_GET["lang"]:null;
        if($lang==null){
            $lang=substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2);
        }
        return $lang;
    }
    public function generate($view, $template, $data = null){
        $lang=$this->getLanguage();
        if(is_array($data)){
            extract($data);
        }
        include ("app/views/$template");
    }
}