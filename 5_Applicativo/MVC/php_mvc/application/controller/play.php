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

    public function multiPlayerGameRoom(){
        session_start();
        // Se il valore è stato inviato via POST, salvalo nella sessione
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["rounds"])) {
            $_SESSION["rounds"] = intval($_POST["rounds"]);
        }
        require_once 'application/views/multiPlayer/gameRoom.php';
    }
}
