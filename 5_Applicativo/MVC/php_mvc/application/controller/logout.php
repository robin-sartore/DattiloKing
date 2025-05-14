<?php

class logout
{

    public function logout()
    {
        session_start();
        unset($_SESSION['logged']);
        unset($_SESSION['lingua']);

        session_destroy();
        header("Location:" . URL);
        exit();
    }

}
?>

