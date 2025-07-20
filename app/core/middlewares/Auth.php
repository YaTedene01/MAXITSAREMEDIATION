<?php
namespace App\core\middlewares;

class Auth{
     public function _invoke(){
    if(!isset($session['Users'])){
        header('Location: http://localhost:8001/');
        exit();
   }
    
}
}