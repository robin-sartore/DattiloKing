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

    public function signUpManage(){
        if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['passwordConfirm']) && !empty($_POST['passwordConfirm'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordConfirm = $_POST['passwordConfirm'];
            $regex = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";
            if(preg_match($regex, $password)){
                if($password == $passwordConfirm){
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
            }else{
                echo "la password deve rispettare: <br>
                    Almeno una lettera maiuscola <br>
                    Almeno una lettera minuscola <br>
                    Almeno un numero <br>
                    Almeno un carattere speciale <br>
                    Almeno 8 caratteri di lunghezza";
            }
        }
    }
}