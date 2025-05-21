<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profilo</title>
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
        .profile-container {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .profile-box {
            background-color: lightgray;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            width: 40%;
            text-align: left;
        }
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 32px;
            cursor: pointer;
            color: white;
            text-decoration: none;
        }
        h2 {
            text-align: center;
            font-size: 3.5rem;
            color: black;
        }
        p {
            font-size: 1.2rem;
            color: black;
            margin-bottom: 3%;
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
<div class="container mt-5 text-center">
    <div class="sett">
        <a href="<?php echo URL?>home/logged" onclick="saveAudioProgress()">
            <img src="<?php echo URL?>application/views/images/back.jpg" alt="Back">
        </a>
    </div>
    <h1 class="title" id="titolo"><?php echo $_SESSION['username'];?></h1>
    <div class="profile-container mt-4">
        <div class="profile-box">
            <h2>Daily Statistics</h2>
            <p><strong>Minimo di parole scritte al minuto:</strong><br> <span id="velMinGiornalieri"></span></p>
            <p><strong>Massimo di parole scritte al minuto:</strong><br> <span id="velMaxGiornalieri"></span></p>
            <p><strong>Media di parole scritte al minuto:</strong><br> <span id="velAvgGiornalieri"></span></p>
            <p><strong>Percentuale di correttezza media:</strong><br> <span id="accuratezzaAvgGiornalieri"></span></p>
            <p><strong>Durata media round:</strong><br> <span id="durataAvgGiornalieri"></span></p>
        </div>
        <div class="profile-box">
            <h2>All Time Statistics</h2>
            <p><strong>Minimo di parole scritte al minuto:</strong><br> <span id="velMinEterni"></span></p>
            <p><strong>Massimo di parole scritte al minuto:</strong><br> <span id="velMaxEterni"></span></p>
            <p><strong>Media di parole scritte al minuto:</strong><br> <span id="velAvgEterni"></span></p>
            <p><strong>Percentuale di correttezza media:</strong><br> <span id="accuratezzaAvgEterni"></span></p>
            <p><strong>Durata media round:</strong><br> <span id="durataAvgEterni"></span></p>
        </div>
    </div>
</div>

<audio id="background-audio" loop>
    <source src='<?php echo URL?>application/views/audio/audio.mp3' type="audio/mpeg">
</audio>

</body>
<script>
    const audio = document.getElementById("background-audio");

    window.onload = () => {
        showStats();
        if (localStorage.getItem("audioTime") !== null) {
            const savedTime = localStorage.getItem("audioTime");
            localStorage.removeItem("audioTime");
            audio.currentTime = parseFloat(savedTime);
            audio.play().catch(error => console.error("Errore durante la riproduzione:", error));
        }
    };

    function saveAudioProgress() {
        localStorage.setItem("audioTime", audio.currentTime);
    }

    function showStats(){
        fetch('application/controller/profile.php', {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {

                const datiEterni = data.datiEterni;
                const datiGiornalieri = data.datiGiornalieri;
                console.log(datiEterni);
                console.log(datiGiornalieri);
                document.getElementById("velMinEterni").textContent = datiEterni.velMin || 'N/A';
                document.getElementById("velMaxEterni").textContent = datiEterni.velMax || 'N/A';
                document.getElementById("velAvgEterni").textContent = datiEterni.velAvg || 'N/A';
                document.getElementById("accuratezzaAvgEterni").textContent = datiEterni.accuratezzaAvg + " %" || 'N/A';
                document.getElementById("durataAvgEterni").textContent = datiEterni.durataAvg + " sec" || 'N/A';

                document.getElementById("velMinGiornalieri").textContent = datiGiornalieri.velMin || 'N/A';
                document.getElementById("velMaxGiornalieri").textContent = datiGiornalieri.velMax || 'N/A';
                document.getElementById("velAvgGiornalieri").textContent = datiGiornalieri.velAvg || 'N/A';
                document.getElementById("accuratezzaAvgGiornalieri").textContent = datiGiornalieri.accuratezzaAvg + " %" || 'N/A';
                document.getElementById("durataAvgGiornalieri").textContent = datiGiornalieri.durataAvg + " sec" || 'N/A';
            })
            .catch(error => console.error('Errore:', error));
    }
</script>
</html>