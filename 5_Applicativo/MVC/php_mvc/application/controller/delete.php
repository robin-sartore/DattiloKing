<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class delete
{
    public function __construct(){

    }
    public function deleteUser(){
        require_once 'application/models/Database.php';
        $this->connection = Database::getConnection();
        $salvataggioUtente = $this->connection->prepare('DELETE FROM utente where username=(?)');
        $salvataggioUtente->bindParam(1, $_SESSION['username']);//implementare session username
        $salvataggioUtente->execute();
        header("Location:" . URL);

    }


}

?>