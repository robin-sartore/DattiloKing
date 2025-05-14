<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class lingua{
    public function cambiaLingua() {

        $linguaScelta = $_POST['lingua'];
        $_SESSION['lingua'] = $linguaScelta;

        if($_SESSION['logged']){
            header('Location: ' . URL . 'home/logged');
        }else{
            header('Location: ' . URL . 'home/notLogged');
        }
    }
}