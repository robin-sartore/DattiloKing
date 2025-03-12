<?php

class delete
{
    public function __construct(){
        require_once 'application/models/Database.php';
        $this->connection = Database::getConnection();
    }
    public function deleteUser(){
        $salvataggioUtente = $this->connection->prepare('DELETE FROM utente where username=(?)');
        $salvataggioUtente->bindParam(1, $_SESSION['username']);//implementare session username
        $salvataggioUtente->execute();
    }


}

?>