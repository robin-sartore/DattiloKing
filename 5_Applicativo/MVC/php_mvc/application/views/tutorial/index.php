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
            font-size: 1.5rem; /* Riduci la dimensione del testo */
            text-align: justify;
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
    <p class="subtitle">DatiloKing è un sito di dattilografia, tecnica di scrittura con tastiera.</p>
    <p class="subtitle">Si può usare da solo cliccando sul bottone SinglePlayer, apparirà una frase casuale e scrivendo con la tastiera si colorerà di verde se si avrà scritto giusto e di rosso se sbagli. Una volta finita una frase ne apparirà un'altra e quando si vuole uscire basta cliccare la freccia per tornare alla home e le statistiche verranno salvate fino alla frase precedente. Una volta nella home si possono vedere le proprie statistiche cliccando sul tasto del profilo raffigurante un mezzo busto.</p>
    <p class="subtitle">Solo se si è loggati si potrà accedere alla modalità multiplayer cliccando sul tasto. Questa modalità ti permette di giocare contro i tuoi amici per vedere chi tra voi sia il miglior dattilografo. Un giocatore può creare una stanza cliccando sul tasto "Crea Stanza" e potrà condividere il codice che gli altri player useranno per entrare nella stanza cliccando il tasto "Unisciti". Il giocatore che ha avviato la stanza sceglierà il numero di round e avvierà la partita. A ogni round i giocatori vedranno la stessa frase e dovranno riscriverla il più velocemente possibile. Alla fine della partita si vedrà una classifica con le varie statistiche di ogni player e chi ha vinto.</p>
    <p class="subtitle">Nella Home cliccando il tasto delle impostazioni si potrà selezionare la lingua e gestire il volume del suono. In più, potrai eseguire il logout o eliminare l'account e tutti i dati salvati.</p>
</div>

</body>
</html>