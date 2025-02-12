<?php
require_once 'User.php';
class UserMapper{

    private $connection;
    public function __construct(){
        require_once 'application/models/Database.php';
        $this->connection = Database::getConnection();
    }

    public function signUpManageModel($username,$password){
        $utenti = $this->connection->prepare('SELECT * from utente');
        $utenti->execute();
        foreach ($utenti as $utente) {
            if($utente['username'] == $username){
                return false;
            }
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        $salvataggioUtente = $this->connection->prepare('INSERT INTO utente (username, password) VALUES (?, ?)');
        $salvataggioUtente->bindParam(1, $username);
        $salvataggioUtente->bindParam(2, $hashedPassword);
        $salvataggioUtente->execute();
        return true;
    }
}