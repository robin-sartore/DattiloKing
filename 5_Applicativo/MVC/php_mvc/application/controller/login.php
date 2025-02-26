<?php

class login{
    public function __construct(){
        require_once 'application/models/UserMapper.php';
    }

    public function index(){
        require  'application/views/templates/header.php';
        require  'application/views/home/index.php';
        require  'application/views/templates/footer.php';
    }

    public function logInManage(){
        if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userMapper = new UserMapper();
            $result = $userMapper->loginInManageModel($username, $password);
            if($result == true){
                echo "login funzionato";
                //header("location: ". URL . "home/homePage");
            }
            else if($result == false){
                echo "utente inesistente o password errata";
            }
        }
    }
}