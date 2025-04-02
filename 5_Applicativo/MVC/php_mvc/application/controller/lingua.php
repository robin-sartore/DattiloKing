<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class lingua{
    public function cambiaLingua(){
        if (isset($_GET['lingua'])) {
            $_SESSION['lingua'] = $_GET['lingua'];
        }
        if($_SESSION['logged']){
            header('Location: ' . URL . 'play/singlePlayerPage');
        }else{
            header('Location: ' . URL . 'home/notLogged');
        }
    }
}
?>