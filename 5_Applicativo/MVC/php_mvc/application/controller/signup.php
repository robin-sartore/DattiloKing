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
        if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['passwordConfirm']) && !empty($_POST['passwordConfirm'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];
            if($password != $passwordConfirm){
                $userMapper = new UserMapper();
                $result = $userMapper->signUpManageModel($username, $password, $passwordConfirm);
                if($result == false){
                    echo "utente gia presente";
                }
                else if($result == true){
                    echo "utente salvato correttamente";
                }
            }else{
                echo "la password di conferma non combacia con la password";
            }
        }
    }
}