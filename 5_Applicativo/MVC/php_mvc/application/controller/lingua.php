<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class lingua{
    public function cambiaLingua(){
        if (isset($_POST['lingua'])) {
            $_SESSION['lingua'] = $_POST['lingua'];
        }
        if($_SESSION['logged']){
            header('Location: ' . URL . 'home/logged');
        }else{
            header('Location: ' . URL . 'home/notLogged');
        }
    }
}
?>