<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tastiera Virtuale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0b0d21;
        }

        .keyboard {
            display: grid;
            grid-template-columns: repeat(11, 1fr);
            gap: 20px;
            justify-content: center;
            padding: 20px;
            margin-top: 50px;
        }

        .key {
            font-size: 2rem;
            padding: 20px;
            background-color: #f0f0f0;
            border: 2px solid #ccc;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .key.pressed {
            background-color: #7efc2e; /* Colore quando il tasto è premuto */
        }

        .mt-5 {
            font-size: 10rem;
            font-weight: bold;
            color: red;
        }

        #key-space {
            width: 50%;
        }

        .frase {
            color: white;
            font-size: 50px;
            width: 65%;
            margin-right: auto;
            margin-left: auto;
            text-align: justify;
            margin-top: 80px;
        }

        .highlight {
            color: #7efc2e;
        }

        .wrong {
            color: red;
        }

        .sottolineato {
            text-decoration: underline;
        }

        .sidebar {
            position: fixed;
            right: 0;
            top: 0;
            width: 250px;
            height: 100vh;
            background-color: #97131e;
            color: white;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
        }

        .player-list {
            margin-top: 20px;
        }

        .player-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body onload="stampaTesto()">
<?php
session_start();
$rounds = isset($_SESSION["rounds"]) ? $_SESSION["rounds"] : "Non specificato";
$code = isset($_SESSION["code"]) ? $_SESSION["code"] : "Non specificato";
$username = isset($_SESSION["username"]) ? $_SESSION["username"] : "Guest";
?>

<div class="sidebar">
    <h2>Velocità:</h2>
    <h1 id="velocita">WPM</h1> <br> <br>
    <h2>Accuratezza:</h2>
    <h1 id="percentualeCorrettezza">%</h1> <br> <br>
    <h2>Tempo:</h2>
    <h1 id="tempo">sec</h1> <br> <br>
    <h2>Numero round:</h2>
    <h1 id="round"><?php echo $rounds; ?></h1>
    <div class="player-list">
        <h2>Giocatori:</h2>
        <div id="playerList"></div>
    </div>
</div>

<div class="frase" id="frase"></div>
<div class="container text-center">
    <div class="keyboard">
        <button class="key" id="key-1">1</button>
        <button class="key" id="key-2">2</button>
        <button class="key" id="key-3">3</button>
        <button class="key" id="key-4">4</button>
        <button class="key" id="key-5">5</button>
        <button class="key" id="key-6">6</button>
        <button class="key" id="key-7">7</button>
        <button class="key" id="key-8">8</button>
        <button class="key" id="key-9">9</button>
        <button class="key" id="key-0">0</button>
        <button class="key" id="key-'">'</button>
        <button class="key" id="key-Q">Q</button>
        <button class="key" id="key-W">W</button>
        <button class="key" id="key-E">E</button>
        <button class="key" id="key-R">R</button>
        <button class="key" id="key-T">T</button>
        <button class="key" id="key-Z">Z</button>
        <button class="key" id="key-U">U</button>
        <button class="key" id="key-I">I</button>
        <button class="key" id="key-O">O</button>
        <button class="key" id="key-P">P</button>
        <button class="key" id="key-È">È</button>
        <button class="key" id="key-A">A</button>
        <button class="key" id="key-S">S</button>
        <button class="key" id="key-D">D</button>
        <button class="key" id="key-F">F</button>
        <button class="key" id="key-G">G</button>
        <button class="key" id="key-H">H</button>
        <button class="key" id="key-J">J</button>
        <button class="key" id="key-K">K</button>
        <button class="key" id="key-L">L</button>
        <button class="key" id="key-É">É</button>
        <button class="key" id="key-À">À</button>
        <button class="key" id="key-SHIFT">↑</button>
        <button class="key" id="key-Y">Y</button>
        <button class="key" id="key-X">X</button>
        <button class="key" id="key-C">C</button>
        <button class="key" id="key-V">V</button>
        <button class="key" id="key-B">B</button>
        <button class="key" id="key-N">N</button>
        <button class="key" id="key-M">M</button>
        <button class="key" id="key-comma">,</button>
        <button class="key" id="key-point">.</button>
    </div>
    <div>
        <button class="key" id="key-space">SPACE</button>
    </div>
</div>

<script>
    let intervalloTempo;
    let primoTastoPremuto = false;
    let tastiPremuti = {};
    let ws;

    document.addEventListener('DOMContentLoaded', (event) => {
        ws = new WebSocket('ws://localhost:8080');
        ws.onopen = function() {
            ws.send(JSON.stringify({ type: 'join', username: '<?php echo $username; ?>' }));
        };
        ws.onmessage = function(event) {
            const data = JSON.parse(event.data);
            if (data.type === 'playerJoined') {
                aggiornaListaGiocatori(data.player);
            } else if (data.type === 'update') {
                aggiornaDatiGiocatore(data.player, data.score, data.accuracy, data.speed);
            }
        };
    });

    function aggiornaListaGiocatori(player) {
        const playerList = document.getElementById('playerList');
        const playerItem = document.createElement('div');
        playerItem.className = 'player-item';
        playerItem.innerHTML = `<strong>${player}</strong>`;
        playerList.appendChild(playerItem);
    }

    function aggiornaDatiGiocatore(player, score, accuracy, speed) {
        const playerItem = document.querySelector(`.player-item strong:contains('${player}')`).parentElement;
        playerItem.innerHTML = `<strong>${player}</strong><br>Score: ${score}<br>Accuracy: ${accuracy}%<br>Speed: ${speed} WPM`;
    }

    document.addEventListener('keydown', function(event) {
        if (primoTastoPremuto == false) {
            intervalloTempo = setInterval(incrementaTempo, 1000);
            primoTastoPremuto = true;
        }
        if (event.key === "Shift") {
            let key = event.key.toUpperCase();
            const button = document.getElementById('key-' + key);
            if (button) {
                button.classList.add('pressed');
            }
            return;
        }
        let key = event.key.toUpperCase();
        if (key === " ") key = "space";
        if (key === ",") key = "comma";
        if (key === ".") key = "point";
        const button = document.getElementById('key-' + key);
        if (button) {
            button.classList.add('pressed');
        }

        if (!tastiPremuti[key]) {
            tastiPremuti[key] = true;
            stampaTesto(event.key);
        }
    });

    document.addEventListener('keyup', function(event) {
        let key = event.key.toUpperCase();
        if (key === " ") key = "space";
        if (key === ",") key = "comma";
        if (key === ".") key = "point";
        const button = document.getElementById('key-' + key);
        if (button) {
            button.classList.remove('pressed');
        }
        tastiPremuti[key] = false;
    });

    let indiceLettera = 0;
    let primoAccesso = true;
    let letteraPrecedentementeSbagliata = false;
    let fraseArray = [];

    let numeroErrori = 0;
    function stampaTesto(lettera) {
        fetch('../../php_mvc/application/controller/phrase.php')
            .then(response => response.text())
            .then(data => {
                if (primoAccesso) {
                    fraseArray = data.split(""); // Converte la frase in un array di caratteri
                    document.getElementById("frase").innerText = data;
                    primoAccesso = false;
                } else {
                    let prossimaLettera = fraseArray[indiceLettera].replace(/\u0332/g, '');
                    if (prossimaLettera === lettera) {
                        if (indiceLettera <= fraseArray.length - 2) {
                            let letteraDopoProssimaLettera = fraseArray[indiceLettera + 1];
                            fraseArray[indiceLettera + 1] = letteraDopoProssimaLettera + '\u0332';
                        }
                        if (letteraPrecedentementeSbagliata === true) {
                            fraseArray[indiceLettera] = `<span class="wrong">${prossimaLettera}</span>`;
                            letteraPrecedentementeSbagliata = false;
                            numeroErrori++;
                        } else {
                            fraseArray[indiceLettera] = `<span class="highlight">${prossimaLettera}</span>`;
                            if (indiceLettera === fraseArray.length - 1) {
                                let percentualeCorrettezza = 100 - (((numeroErrori / fraseArray.length) * 100).toFixed(1));
                                document.getElementById('percentualeCorrettezza').innerText = percentualeCorrettezza + "%";

                                clearInterval(intervalloTempo);
                                let velocita = (fraseArray.length / 5) / (tempo / 60);
                                document.getElementById('velocita').innerHTML = velocita + " WPM";

                                document.getElementById('tempo').innerHTML = tempo + " sec";

                                tempo = 0;
                                primoTastoPremuto = false;
                                indiceLettera = 0;
                                primoTastoPremuto = false;
                                primoAccesso = true;
                                fraseArray = [];
                                numeroErrori = 0;

                                // Invia aggiornamento al server
                                ws.send(JSON.stringify({
                                    type: 'update',
                                    username: '<?php echo $username; ?>',
                                    score: fraseArray.length,
                                    accuracy: percentualeCorrettezza,
                                    speed: velocita
                                }));

                                stampaTesto();
                            }
                        }
                        indiceLettera++;
                    } else {
                        letteraPrecedentementeSbagliata = true;
                    }
                    document.getElementById("frase").innerHTML = fraseArray.join("");
                }
            })
            .catch(error => console.error('Errore:', error));
    }

    let tempo = 0;
    function incrementaTempo() {
        tempo++;
        console.log(tempo);
    }
</script>
</body>
</html>
