<!DOCTYPE html>
<html lang="it">
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
            overflow: hidden; /* Evita lo scroll */
        }
        .title {
            font-size: 6rem; /* Riduci la dimensione del titolo */
            font-weight: bold;
            color: red;
            margin-bottom: 20px; /* Spazio sotto il titolo */
        }
        .subtitle {
            font-size: 1.3rem; /* Riduci la dimensione del testo */
            text-align: center;
            max-width: 800px; /* Limita la larghezza del testo */
            margin: 0 auto; /* Centra il testo */
            padding: 0 20px; /* Aggiunge padding laterale */
        }

        /* Container principale */
        .container {
            display: flex;
            flex-direction: column;
            justify-content: flex-start; /* Allinea il contenuto in alto */
            align-items: center; /* Centra orizzontalmente */
            height: 100vh; /* Altezza uguale alla viewport */
            padding-top: 80px; /* Spazio dall'alto */
            overflow-y: auto; /* Abilita lo scroll verticale se necessario */
        }

        /* Pulsanti in alto */
        .top-buttons {
            position: fixed; /* Fissa i pulsanti in alto */
            top: 20px;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            box-sizing: border-box;
            z-index: 1000; /* Assicura che i pulsanti siano sopra il contenuto */
        }
        .top-buttons img {
            width: 50px;
            cursor: pointer;
            transition: opacity 0.3s;
        }
        .top-buttons img:hover {
            opacity: 0.7;
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
            z-index: 1001; /* Assicura che il pannello sia sopra tutto */
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
<!-- Pulsanti in alto -->
<div class="top-buttons">
    <div class="sett">
        <a href="<?php echo URL?>home/logged">
            <img src="<?php echo URL?>application/views/images/back.jpg" alt="Back">
        </a>
    </div>
</div>

<!-- Contenuto principale -->
<div class="container">
    <h1 class="title">Tutorial</h1>
    <p class="subtitle">DatiloKing è una piattaforma dedicata alla dattilografia, ovvero la tecnica di scrittura tramite tastiera.</p>
    <br>
    <p class="subtitle">Nella modalità <b>Single Player</b>, accessibile cliccando sull'apposito pulsante, verrà mostrata una frase casuale da digitare. Durante la scrittura, il testo si colorerà di verde per ogni parola corretta e di rosso per eventuali errori. Una volta completata la frase, ne comparirà automaticamente un’altra. Per uscire dalla modalità, è sufficiente cliccare sulla freccia per tornare alla home: in questo modo, le statistiche verranno salvate fino all’ultima frase completata.</p>
    <br>
    <p class="subtitle">Dalla home, è possibile visualizzare le proprie statistiche cliccando sull’icona del profilo, rappresentata da un mezzo busto.</p>
    <br>
    <p class="subtitle">Se si è effettuato il login, si potrà accedere alla modalità Multiplayer, selezionabile tramite l’apposito tasto. In questa modalità è possibile sfidare i propri amici per determinare chi sia il miglior dattilografo.</p>
    <br>
    <p class="subtitle">Un giocatore può creare una stanza cliccando su “Crea Stanza” e condividere il codice univoco con gli altri partecipanti, i quali potranno unirsi cliccando su “Unisciti”. Il creatore della stanza potrà scegliere il numero di round e avviare la partita. In ogni round, tutti i giocatori vedranno la stessa frase e dovranno riscriverla il più rapidamente e correttamente possibile. Al termine della sfida, verrà mostrata una classifica finale con le statistiche dettagliate di ciascun partecipante e il nome del vincitore.</p>
    <br>
    <p class="subtitle">Dalla Home, cliccando sull’icona delle impostazioni, si potrà selezionare la lingua dell’interfaccia, regolare il volume dei suoni, effettuare il logout oppure eliminare l’account e tutti i dati salvati.</p>
</div>

</body>
</html>