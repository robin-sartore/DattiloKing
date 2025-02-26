<?php
require_once 'User.php';
class UserMapper{

    private $connection;
    public function __construct(){
        require_once 'Database.php';
        $this->connection = Database::getConnection();
    }

    public function signUpManageModel($username,$password, $passwordConfirm){
        $utenti = $this->connection->prepare('SELECT * from utente');
        $utenti->execute();
        foreach ($utenti as $utente){
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

    public function loginInManageModel($username, $password){
        $utenti = $this->connection->prepare('SELECT * from utente');
        $utenti->execute();
        foreach ($utenti as $utente) {
            if($utente['username'] == $username){
                if(password_verify($password, $utente['password'])){
                    $_SESSION['logged'] = true;
                    return true;
                }
            }
        }
        $_SESSION['logged'] = false;
        return false;
    }


    public function getPhraseModel() {
        $result = $this->connection->query("SELECT COUNT(*) as total FROM frase");
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalRow = $row['total'];

        if ($totalRow <= 0) {
            return "Nessun dato presente nel DB";
        }
        
        $casual = rand(0, $totalRow - 1);

        $query = "SELECT testo FROM frase LIMIT 1 OFFSET ?";
        $frase = $this->connection->prepare($query);
        $frase->bindParam(1, $casual, PDO::PARAM_INT);
        $frase->execute();

        $result = $frase->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return $result['testo'];
        } else {
            return "Nessuna frase trovata";
        }
    }
}