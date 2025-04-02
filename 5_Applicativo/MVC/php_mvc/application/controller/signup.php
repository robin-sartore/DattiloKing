<?php

class signup{

    public function __construct(){
        require_once 'application/models/UserMapper.php';
    }

    public function index(){
        require  'application/views/homeLogged/index.php';
    }

    public function signUpManage(){
        if(isset($_POST['username']) && !empty($_POST['username']) &&
            isset($_POST['password']) && !empty($_POST['password']) &&
            isset($_POST['passwordConfirm']) && !empty($_POST['passwordConfirm'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];
            $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{8,}$/";

            if(empty($password)) {
                header("Location: " . URL . "signup/form?error=password_empty");
                exit;
            }

            if(!preg_match($regex, $password)) {
                header("Location: " . URL . "signup/form?error=password_invalid");
                exit;
            }

            if($password !== $passwordConfirm) {
                header("Location: " . URL . "signup/form?error=password_mismatch");
                exit;
            }

            $userMapper = new UserMapper();
            $result = $userMapper->signUpManageModel($username, $password, $passwordConfirm);

            if ($result === false) {
                header("Location: " . URL . "signup/form?error=user_exists");
                exit;
            } else {
                header("Location: " . URL . "signup/form?success=registered");
                exit;
            }
        } else {
            header("Location: " . URL . "signup/form?error=missing_fields");
            exit;
        }
    }


}