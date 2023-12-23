<?php
if(isset($_COOKIE["token"])){
    unset($_COOKIE["token"]); setcookie("token", '', -1, '/'); $data= array( "message"=> "You have successfully logged out!"); 
}else{
    $data= array( "message"=> "You were not logged in!");
}