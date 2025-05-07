<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class home
{
    public function __construct(){
        if(!isset($_SESSION['lingua'])){
            $_SESSION['lingua'] = 'italiano';
        }
    }
    public function logged(){
        if($_SESSION['logged']){
            require 'application/views/homeLogged/index.php';
        }else{
            header('location: ' . URL . 'account/accountPage');
        }
    }

    public function notLogged(){
        require  'application/views/homeNotLogged/index.php';
    }

    public function openTutorial(){
        require 'application/views/tutorial/index.php';
    }
}