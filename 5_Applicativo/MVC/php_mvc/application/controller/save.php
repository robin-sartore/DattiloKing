<?php

class save{
    public function __construct(){
        require_once '../models/UserMapper.php';
    }

    public function saveStats(){
        $data = json_decode(file_get_contents('php://input'), true);

        if (isset($data['accuratezza']) && isset($data['velocita']) && $data['tempo']) {
            $accuratezza = $data['accuratezza'];
            $velocita = $data['velocita'];
            $tempo = $data['tempo'];

            $userMapper = new UserMapper();
            $result = $userMapper->saveStatsModel($accuratezza, $velocita, $tempo);



            if($result){
                echo json_encode(['status' => 'success', 'message' => 'Dati salvati']);
            }else{
                echo json_encode(['status' => 'error', 'message' => 'Errore nel salvataggio dei dati']);
            }
            }else{
                echo json_encode(['status' => 'error', 'message' => 'Dati mancanti']);
            }
        }
}

$saveController = new save();
$saveController->saveStats();

