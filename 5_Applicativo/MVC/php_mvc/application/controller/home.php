<?php

class home
{
    public function logged(){
        require  'application/views/homeLogged/index.php';
    }

    public function notLogged(){
        require  'application/views/homeNotLogged/index.php';
    }

    public function openTutorial(){
        require 'application/views/tutorial/index.php';
    }

}