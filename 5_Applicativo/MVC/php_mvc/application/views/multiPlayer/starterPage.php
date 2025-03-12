<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dattilo King</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
    <style>
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
        .sett {
            position: absolute;
            top: 20px;
            left: 20px;
            cursor: pointer;
        }
        .sett img {
            width: 50px;
        }

        /* Pannello Impostazioni */
        .settings-panel {
            position: fixed;
            top: 0;
            left: -350px;
            width: 350px;
            height: 100%;
            background-color: #ebe8e8;
            padding: 20px;
            transition: left 0.3s ease;
            box-shadow: 3px 0px 10px rgba(0, 0, 0, 0.5);
            font-family: Arial, sans-serif;
        }
        .settings-panel.open {
            left: 0;
        }
        .settings-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
            color: black;
        }
        .close-btn {
            cursor: pointer;
            font-size: 30px;
        }
        .settings-content {
            margin-top: 20px;
        }
        .settings-content h3 {
            font-size: 20px;
            color: black;
        }
        .dropdown {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #b5b5b5;
            font-size: 16px;
            color: black;
        }
        .radio-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .radio-group label {
            font-size: 18px;
            color: black;
        }
        .settings-content button {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            background: red;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 1.2rem;
        }
        .settings-content button:hover {
            background: darkred;
        }
        .btn-home {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }

        .btn-home img {
            width: 50px; /* Regola la dimensione dell'icona */
            height: auto;
            transition: opacity 0.3s;
        }

        .btn-home:hover img {
            opacity: 0.7;
        }

    </style>
</head>
<body>
<div class="container d-flex flex-column justify-content-center align-items-center vh-100">
    <!-- Icona back -->

        <div class="sett">
            <a href="<?php echo URL?>home/logged">
                <img src="<?php echo URL?>application/views/images/back.jpg" alt="Back">
            </a>
        </div>

    <!-- Titolo e contenuto principale -->
    <h1 class="title">Multiplayer</h1>
    <p class="subtitle">Play against your friends</p>
    <form action="<?php echo URL?>play/multiPlayerCreateRoom">
        <button class="btn btn-custom">Create Room</button>
    </form>
    <form action="<?php echo URL?>play/multiPlayerJoinRoom">
        <button class="btn btn-custom">Join Room</button>
    </form>
</body>
</html>
