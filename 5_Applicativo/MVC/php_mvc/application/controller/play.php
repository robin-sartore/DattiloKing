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
        require_once 'application/views/multiPlayer/joinRoom.php';
    }

    public function multiPlayerRoomList(){
        require_once 'application/views/multiPlayer/list.php';
    }

    public function multiPlayerLeaderboard(){
        require_once 'application/views/multiPlayer/leaderboard.php';
    }
}