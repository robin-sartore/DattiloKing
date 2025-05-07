<?php
session_start();
class profile
{
    public function profilePage(){
        require 'application/views/profile/index.php';
    }

    public function showStats(){
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest'){
            if($_SESSION['logged']){
                require 'application/models/UserMapper.php';

                if(isset($_SESSION['username'])){
                    $username = $_SESSION['username'];
                }

                $userMapper = new UserMapper();
                $stats = $userMapper->showStatsModel($username);

                header('Content-Type: application/json');
                echo json_encode($stats);
                exit();
            }
        }
    }
}

$profile = new profile();
$profile->showStats();