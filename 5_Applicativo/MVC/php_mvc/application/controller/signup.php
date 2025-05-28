<?php

class signup{

    public function __construct(){
        require_once 'application/models/UserMapper.php';
    }

    public function index(){
        require  'application/views/account/index.php';
    }

    public function signUpManage(){
        if(isset($_POST['username']) && !empty($_POST['username']) &&
            isset($_POST['password']) && !empty($_POST['password']) &&
            isset($_POST['passwordConfirm']) && !empty($_POST['passwordConfirm'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];

            // Stringa del regex che servirà a verificare che la stringa sia lunga almeno 8 caratteri,
            // contenga almeno una lettera minuscola, una maiuscola, una cifra e un carattere speciale
            $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{8,}$/";

            if(empty($password)) {
                exit;
            }

            if(!preg_match($regex, $password)) {
                exit;
            }

            if($password !== $passwordConfirm) {
                exit;
            }

            $userMapper = new UserMapper();
            $result = $userMapper->signUpManageModel($username, $password, $passwordConfirm);

            if ($result === false) {
                echo json_encode(['error' => 'user_exists']);
                exit;
            } else {
                echo json_encode(['success' => true]);
                exit;
            }
        } else {
            exit;
        }
    }


}