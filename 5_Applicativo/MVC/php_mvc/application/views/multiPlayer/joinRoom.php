<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'application/models/RoomMapper.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["code"])) {
    $codice = $_POST["code"];
    $roomMapper = new RoomMapper();

    if ($roomMapper->roomExists($codice)) {
        $roomMapper->aggiungiPartecipante($codice, $_SESSION['username']);
        $_SESSION['code'] = $codice;
        $_SESSION['creatore'] = false;
        header("Location: " . URL . "play/multiPlayerRoomList");
        exit;
    } else {
        echo "La stanza non esiste.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dattilo King</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <style>
        .sett {
            position: absolute;
            top: 20px;
            left: 20px;
            cursor: pointer;
        }
        .sett img {
            width: 50px;
        }
        body {
            background-color: #0b0d21;
            color: white;
            text-align: center;
            font-family: 'Lalezar', cursive;
            margin: 0;
        }
        .title {
            font-size: 10rem;
            font-weight: bold;
            color: red;
        }
        .subtitle {
            font-size: 2.5rem;
        }
        .btn-custom {
            font-size: 1.5rem;
            padding: 15px 30px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: none;
            color: black;
            font-weight: bold;
            box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.5);
            width: 300px;
            margin: 20px auto;
        }
        .btn-custom:hover {
            background: rgba(255, 255, 255, 0.4);
        }
        .text-custom {
            font-size: 1.5rem;
            padding: 15px 30px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: none;
            color: black;
            font-weight: bold;
            box-shadow: 0px 0px 15px rgba(255, 255, 255, 0.5);
            width: 300px;
            margin: 20px auto;
        }
    </style>
</head>
<body>
<div class="container d-flex flex-column justify-content-center align-items-center vh-100">
    <!-- Icona back -->
    <div class="sett">
        <a href="<?php echo URL?>play/multiPlayerStarterPage">
            <img src="<?php echo URL?>application/views/images/back.jpg" alt="Back">
        </a>
    </div>

    <!-- Titolo e contenuto principale -->
    <h1 class="title">Join Room</h1>
    <form action="<?php echo URL?>play/multiPlayerJoinRoom" method="POST">
        <p class="subtitle">Insert Code</p>
        <input class="text-custom" type="text" name="code" required>
        <br>
        <button class="btn btn-custom">Join Room</button>
    </form>
</body>
</html>
