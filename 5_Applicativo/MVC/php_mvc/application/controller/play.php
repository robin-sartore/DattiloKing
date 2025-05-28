<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
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

    public function multiPlayerJoinRoom() {
        // Se il valore è stato inviato via POST, salvalo nella sessione
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["code"])) {
            $_SESSION["code"] = $_POST["code"];
        }
        require_once 'application/views/multiPlayer/joinRoom.php';
    }

    public function multiPlayerRoomList(){
        require_once 'application/views/multiPlayer/list.php';
    }
    public function getRoomPlayers() {
        require_once 'application/models/RoomMapper.php';
        $roomMapper = new RoomMapper();

        if (isset($_GET['code'])) {
            $code = $_GET['code'];
            $players = $roomMapper->getPlayersInRoom($code);
            $creator = $roomMapper->getCreator($code); // Recupera il nome del creatore
            echo json_encode(['players' => $players, 'creator' => $creator]);
        } else {
            echo json_encode([]);
        }
    }
    public function multiPlayerLeaderboard(){
        require_once 'application/views/multiPlayer/leaderboard.php';
    }

    public function multiPlayerGameRoom() {
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST" &&
            isset($_POST["code"]) &&
            isset($_POST["rounds"]) &&
            isset($_POST["creatore"])) {

            $codice = $_POST["code"];
            $rounds = intval($_POST["rounds"]);
            $creatore = $_POST["creatore"];

            $_SESSION["code"] = $codice;
            $_SESSION["rounds"] = $rounds;
            $_SESSION["creatore"] = true;

            // Connessione e inserimento nel DB usando RoomMapper
            require_once 'application/models/RoomMapper.php';
            $roomMapper = new RoomMapper();

            $stanza_id = $roomMapper->creaStanza($codice, $creatore, $rounds);

            $roomMapper->aggiungiPartecipante($codice, $creatore);

            $_SESSION["stanza_id"] = $stanza_id;

            require_once 'application/views/multiPlayer/gameRoom.php';

        } else {
            header("Location: " . URL . "play/multiPlayerCreateRoom?error=missing_fields");
            exit;
        }
    }
}
