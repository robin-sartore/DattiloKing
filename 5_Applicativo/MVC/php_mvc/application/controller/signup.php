<?php

class signup{

    public function __construct(){
        require_once 'application/models/UserMapper.php';
    }

    public function index(){
        require  'application/views/templates/header.php';
        require  'application/views/home/index.php';
        require  'application/views/templates/footer.php';
    }

    public function signUpPage(){
        require_once 'application/views/signup/index.php';
    }

    public function signUpManage(){
        if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userMapper = new UserMapper();
            $result = $userMapper->signUpManageModel($username, $password);
            if($result == false){
                echo "utente gia presente";
            }
            else if($result == true){
                echo "utente salvato correttamente";
            }
        }
    }
}