<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class save{
    public function __construct(){
        require_once '../models/UserMapper.php';
    }

    public function saveStats(){
        if(isset($_SESSION['logged']) && $_SESSION['logged']){
            $data = json_decode(file_get_contents('php://input'), true);

            if (isset($data['accuratezza']) && isset($data['velocita']) && $data['tempo']) {
                $accuratezza = $data['accuratezza'];
                $velocita = $data['velocita'];
                $tempo = $data['tempo'];
                if(isset($_SESSION['username'])){
                    $username = $_SESSION['username'];
                }
                $frase = $data['frase'];

                $userMapper = new UserMapper();
                $result = $userMapper->saveStatsModel($accuratezza, $velocita, $tempo, $username, $frase);

                if($result){
                    echo json_encode(['status' => 'success', 'message' => 'Dati salvati']);
                }else{
                    echo json_encode(['status' => 'error', 'message' => 'Errore nel salvataggio dei dati']);
                }
            }else{
                echo json_encode(['status' => 'error', 'message' => 'Dati mancanti']);
            }
        }else{
            echo json_encode(['status' => 'error', 'message' => 'Utente non autenticato']);
        }
    }
}

$saveController = new save();
$saveController->saveStats();

