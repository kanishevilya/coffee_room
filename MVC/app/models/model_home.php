<?php
class Model_Home implements Model{
    public function getData(){
        return array(
            "title"=>array(
                "en"=>"Home",
                "qq"=>"Üi", 
                "kk"=>"Үй", 
                "uk"=>"Головна",
                "ru"=>"Главная"
            )
        );
    }
}