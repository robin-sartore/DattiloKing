<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class delete
{
    public function __construct(){
        require_once 'application/models/UserMapper.php';
    }
    public function deleteUser(){
        $userMapper = new UserMapper();
        $result = $userMapper->deleteUserModel();
        if($result){
            echo json_encode(['status' => 'success', 'message' => 'Utente Salvato con successo!']);
        }else{
            echo json_encode(['status' => 'error', 'message' => 'Errore nell eliminazione dell utente!']);
        }
        header('location: ' . URL . 'home/notLogged');

    }


}

?>