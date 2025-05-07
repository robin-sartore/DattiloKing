<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}require_once 'application/models/RoomMapper.php';

// Funzione per generare un codice stanza univoco
function generaCodiceRoom($length = 6) {
    return strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'), 0, $length));
}

$codice = generaCodiceRoom();
$roomMapper = new RoomMapper();
$roomMapper->creaStanza($codice, $_SESSION['username'], 0); // Inizializza i round a 0
$roomMapper->aggiungiPartecipante($codice, $_SESSION['username']);

$_SESSION['code'] = $codice;
$_SESSION['creatore'] = true;
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
        .player-container {
            margin-top: 20px;
            margin-left: 35px;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: left;
        }
        .player {
            font-size: 1.5rem;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px;
            border-radius: 5px;
            margin: 5px 0;
        }
        .creator {
            color: yellow;
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
    <h1 class="title">Create Room</h1>
    <form action="<?php echo URL ?>play/multiPlayerGameRoom" method="POST">
        <p class="subtitle">Code</p>
        <input class="text-custom" type="text" name="code" readonly value="<?php echo $codice ?>">

        <p class="subtitle">Numero Round</p>
        <input class="text-custom" type="number" name="rounds" required>
        <input type="hidden" name="creatore" value="<?php echo $_SESSION['username'] ?>">

        <p class="subtitle">Giocatori nella stanza:</p>
        <div id="playerContainer" class="player-container">
        </div>
        <br>
        <button class="btn btn-custom" type="submit">Start game</button>
    </form>
    <script>
        // Passa il valore di $_SESSION['username'] a una variabile JavaScript
        const currentUsername = '<?php echo $_SESSION['username']; ?>';

        setInterval(() => {
            fetch('<?php echo URL ?>play/getRoomPlayers?code=<?php echo $codice ?>')
                .then(res => res.json())
                .then(data => {
                    const container = document.getElementById('playerContainer');
                    container.innerHTML = '';
                    const creator = data.creator; // Recupera il nome del creatore
                    data.players.forEach(player => {
                        const playerDiv = document.createElement('div');
                        playerDiv.className = 'player';

                        // Confronta la variabile JavaScript currentUsername
                        if (player === currentUsername) {
                            playerDiv.textContent = player + " (TU)";
                        } else {
                            playerDiv.textContent = player;
                        }

                        // Evidenzia il nome del creatore in giallo
                        if (player === creator) {
                            playerDiv.className += ' creator';
                        }

                        container.appendChild(playerDiv);
                    });
                });
        }, 2000);
    </script>
</body>
</html>
