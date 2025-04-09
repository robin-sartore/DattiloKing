<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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
        $_SESSION['username'] = $utente['username'];
        $_SESSION['logged'] = true;
        return true;
    }

    public function loginInManageModel($username, $password){
        $utenti = $this->connection->prepare('SELECT * from utente');
        $utenti->execute();
        foreach ($utenti as $utente) {
            if($utente['username'] == $username){
                if(password_verify($password, $utente['password'])){
                    $_SESSION['username'] = $utente['username'];
                    $_SESSION['logged'] = true;
                    return true;
                }
            }
        }
        $_SESSION['logged'] = false;
        return false;
    }


    public function getPhraseModel() {
        $result = $this->connection->prepare("SELECT COUNT(*) as total FROM frase WHERE lingua = ?");
        $result->bindParam(1,$_SESSION['lingua']);
        $result->execute();
        $row = $result->fetch(PDO::FETCH_ASSOC);
        $totalRow = $row['total'];

        if ($totalRow <= 0) {
            return "Nessun dato presente nel DB";
        }

        $casual = rand(0, $totalRow - 1);

        $query = "SELECT testo FROM frase WHERE lingua = ? LIMIT 1 OFFSET ?";
        $frase = $this->connection->prepare($query);
        $frase->bindParam(1, $_SESSION['lingua']);
        $frase->bindParam(2, $casual, PDO::PARAM_INT);
        $frase->execute();

        $result = $frase->fetch(PDO::FETCH_ASSOC);

        if($result){
            return $result['testo'];
        }else{
            return "Nessuna frase trovata";
        }
    }

    public function saveStatsModel($accuratezza,$velocita,$tempo,$username,$frase){
        $pdoQueryTurno = $this->connection->prepare('SELECT MAX(numero) FROM turno_storico WHERE utente_username = ?');
        $pdoQueryTurno->bindParam(1,$username);
        $pdoQueryTurno->execute();
        $ultimoTurnoUtente = $pdoQueryTurno->fetchColumn();
        if ($ultimoTurnoUtente !== false) {
            $turno = $ultimoTurnoUtente + 1;
        } else {
            $turno = 0;
        }

        $pdoQuerySalvataggio = $this->connection->prepare('INSERT INTO turno_storico(accuratezza, velocita, tempo, data, utente_username, frase_testo, numero) VALUES (?, ?, ?, ?, ?,?,?)');
        $pdoQuerySalvataggio->bindParam(1, $accuratezza);
        $pdoQuerySalvataggio->bindParam(2, $velocita);
        $pdoQuerySalvataggio->bindParam(3, $tempo);
        $dataAttuale = date('Y-m-d');
        $pdoQuerySalvataggio->bindParam(4, $dataAttuale);
        $pdoQuerySalvataggio->bindParam(5, $username);
        $pdoQuerySalvataggio->bindParam(6, $frase);
        $pdoQuerySalvataggio->bindParam(7, $turno);

        $executed = $pdoQuerySalvataggio->execute();

        if($executed && $pdoQuerySalvataggio->rowCount() > 0){
            return true;
        }else {
            return false;
        }
    }
}