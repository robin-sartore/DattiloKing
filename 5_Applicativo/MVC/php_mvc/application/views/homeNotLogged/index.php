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
        }
        .title {
            font-size: 10rem;
            font-weight: bold;
            color: red;
        }
        .subtitle {
            font-size: 3rem;
            margin-bottom: 30px;
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
    <div class="sett" onclick="openSettings()">
        <img src="<?php echo URL?>application/views/images/settings.png" alt="Settings">
    </div>

    <h1 class="title">Dattilo King</h1>
    <p class="subtitle">The best way to learn to write fast</p>
    <form action="<?php echo URL ?>play/singlePlayerPage">
        <button class="btn btn-custom">Single player</button>
    </form>
    <button class="btn btn-custom" disabled>Multi player</button>
    <div class="d-flex gap-3 mt-3">
        <form action="<?php echo URL?>account/accountPage" onsubmit="saveAudioProgress()">
            <button class="btn btn-custom" style="width: 300px;">Sign In/Up</button>
        </form>
        <!--<input class="btn btn-custom" type="submit" value="Sign In">
        <input class="btn btn-custom" type="submit" value="Sign Up"> -->
    </div>
</div>

<!-- Pannello Impostazioni -->
<div id="settingsPanel" class="settings-panel">
    <div class="settings-header">
        <span>Settings</span>
        <span class="close-btn" onclick="closeSettings()">×</span>
    </div>
    <div class="settings-content">
        <h3>Lingua</h3>
        <select class="dropdown">
            <option>Italiano</option>
            <option>English</option>
            <option>Español</option>
        </select>

        <h3 class="mt-4">Audio</h3>
        <div class="radio-group">
            <label><input type="radio" name="audio" value="on" id="radio-on"> On</label>
            <label><input type="radio" name="audio" value="off" id="radio-off"> Off</label>
        </div>
        <br>
        <br>
        <div>
            <a href="<?php echo URL?>home/openTutorial">
                <button>Tutorial</button>
            </a>
            <br>
            <br>
        </div>
    </div>
</div>

<audio id="background-audio" loop>
    <source src='<?php echo URL?>application/views/audio/audio.mp3' type="audio/mpeg">
    Il tuo browser non supporta l'audio
</audio>

<script>
    let audio = document.getElementById("background-audio");
    document.getElementById("radio-on").checked = true;

    // Funzione per avviare o fermare l'audio in base alla selezione del radiobutton
    function updateAudio() {

        // Se "on" è selezionato, avvia la riproduzione dell'audio
        if (document.getElementById("radio-on").checked === true) {
            if (localStorage.getItem("audioTime") !== null){
                const savedTime = localStorage.getItem("audioTime");
                localStorage.removeItem("audioTime");
                audio.currentTime = parseFloat(savedTime);
                audio.play().catch(error => console.error("Errore durante la riproduzione:", error));
            }
            else {
                audio.play()
                    .catch(error => console.error("Errore durante la riproduzione:", error));
            }
        } else {
            audio.pause();
        }
    }

    // Aggiunge l'evento "change" a tutti i radiobutton per rilevare cambiamenti
    const radioButtons = document.querySelectorAll('input[name="audio"]'); // Seleziona tutti i radiobutton con name="audio"
    radioButtons.forEach(radio => {
        radio.addEventListener("change", updateAudio); // Collega l'evento "change" alla funzione updateAudio
    });

    // Al caricamento della pagina esegue la funzione
    window.onload = () => {
        //localStorage.clear();
        console.log(localStorage.length);
        if (localStorage.length !== 0) {
            const on = JSON.parse(localStorage.getItem("radio-on"));
            const off = JSON.parse(localStorage.getItem("radio-off"));
            document.getElementById("radio-on").checked = on;
            document.getElementById("radio-off").checked = off;
        }
        updateAudio();

        window.addEventListener('click', () => {
            if (document.getElementById("radio-on").checked) {
                audio.play().catch(error => console.error("Errore durante la riproduzione:", error));
            }
        }, { once: true });
    };


    function saveAudioProgress() {
        // Recupera il valore del radiobutton selezionato
        const audioStatus = document.querySelector('input[name="audio"]:checked').value;

        // Verifica se l'audio è su "On" e salva i progressi
        if (audioStatus === "on") {
            // viene usato JSON.stringify per salvare il valore booleano come stringa
            localStorage.setItem("radio-on", JSON.stringify(true));
            localStorage.setItem("radio-off", JSON.stringify(false));
            localStorage.setItem("audioTime", audio.currentTime); // Salva la posizione attuale
            console.log("Progressi audio salvati");
        } else {
            localStorage.setItem("radio-off", JSON.stringify(true));
            localStorage.setItem("radio-on", JSON.stringify(false));
            console.log("L'audio è spento");
        }
    }

    function openSettings() {
        document.getElementById("settingsPanel").classList.add("open");
    }

    function closeSettings() {
        document.getElementById("settingsPanel").classList.remove("open");
    }

    // Funzione per il logout
    function logout() {
        alert('Logout effettuato!'); // Sostituisci con la logica effettiva di logout
        closeSettings(); // Chiudi il pannello dopo il logout
    }

    // Funzione per eliminare l'account
    function deleteAccount() {
        if (confirm('Sei sicuro di voler eliminare il tuo account? Questa azione è irreversibile.')) {
            alert('Account eliminato!'); // Sostituisci con la logica effettiva di eliminazione
            closeSettings(); // Chiudi il pannello dopo l'eliminazione
        }
    }
</script>
</body>
</html>