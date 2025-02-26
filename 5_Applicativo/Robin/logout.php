<?php

class logout
{

    public function logout()
    {
        session_start();
        unset($_SESSION['logged']);

        session_destroy();
        header("Location:" . URL);
        exit();
    }

}
?>

