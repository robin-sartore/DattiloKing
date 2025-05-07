<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class signin{
    public function __construct(){
        require_once 'application/models/UserMapper.php';
    }

    public function index(){
        require  'application/views/homeNotLogged/index.php';
    }

    public function signInManage(){
        if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $userMapper = new UserMapper();
            $result = $userMapper->loginInManageModel($username, $password);

            if($result === true){
                header("Location: " . URL . "home/logged");
                exit;
            }else{
                header("Location: " . URL . "signin/form?error=invalid_credentials");
                exit;
            }
        }else{
            header("Location: " . URL . "signin/form?error=missing_fields");
            exit;
        }
    }
}