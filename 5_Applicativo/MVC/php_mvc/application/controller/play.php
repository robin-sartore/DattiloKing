<?php

class play{
    public function singlePlayerPage(){
        require_once 'application/views/singlePlayerFrontend/index.php';
    }

    public function multiPlayerStarterPage(){
        require_once 'application/views/multiPlayer/starterPage.php';
    }

    public function multiPlayerCreateRoom(){
        require_once 'application/views/multiPlayer/createRoom.php';
    }

    public function multiPlayerJoinRoom(){
        session_start();
        // Se il valore è stato inviato via POST, salvalo nella sessione
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["code"])) {
            $_SESSION["code"] = $_POST["code"];
        }
        require_once 'application/views/multiPlayer/joinRoom.php';
    }

    public function multiPlayerRoomList(){
        require_once 'application/views/multiPlayer/list.php';
    }

    public function multiPlayerLeaderboard(){
        require_once 'application/views/multiPlayer/leaderboard.php';
    }
    public function getRoomPlayers() {
        require_once 'application/models/RoomMapper.php';
        $roomMapper = new RoomMapper();

        if (isset($_GET['code'])) {
            $players = $roomMapper->getPlayersInRoom($_GET['code']);
            echo json_encode($players);
        } else {
            echo json_encode([]);
        }
    }

    public function multiPlayerGameRoom() {
        session_start();

        // Assicurati che tutti i dati arrivino correttamente
        if ($_SERVER["REQUEST_METHOD"] == "POST" &&
            isset($_POST["code"]) &&
            isset($_POST["rounds"]) &&
            isset($_POST["creatore"])) {

            $codice = $_POST["code"];
            $rounds = intval($_POST["rounds"]);
            $creatore = $_POST["creatore"];

            // Salva nella sessione
            $_SESSION["code"] = $codice;
            $_SESSION["rounds"] = $rounds;
            $_SESSION["creatore"] = true;

            // Connessione e inserimento nel DB usando RoomMapper
            require_once 'application/models/RoomMapper.php';
            $roomMapper = new RoomMapper();

            // 1. Crea stanza
            $stanza_id = $roomMapper->creaStanza($codice, $creatore);

            // 2. Aggiungi il creatore come partecipante
            $roomMapper->aggiungiPartecipante($stanza_id, $creatore);

            // 3. Salva l'id della stanza nella sessione
            $_SESSION["stanza_id"] = $stanza_id;

            // 4. Vai nella waiting room
            require_once 'application/views/multiPlayer/gameRoom.php';

        } else {
            // Mancano dei dati
            header("Location: " . URL . "play/multiPlayerCreateRoom?error=missing_fields");
            exit;
        }
    }

}
