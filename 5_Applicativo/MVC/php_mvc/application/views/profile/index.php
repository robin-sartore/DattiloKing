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
        <a href="<?php echo URL?>home/logged">
            <img src="<?php echo URL?>application/views/images/back.jpg" alt="Back">
        </a>
    </div>
    <h1 class="title">Profilo</h1>
    <div class="profile-container mt-4">
        <div class="profile-box">
            <h2>Daily Statistics</h2>
            <p><strong>Minimo di parole scritte al minuto:</strong><br> 20.4</p>
            <p><strong>Massimo di parole scritte al minuto:</strong><br> 20.4</p>
            <p><strong>Media di parole scritte al minuto:</strong><br> 20.4</p>
            <p><strong>Percentuale di errore per round:</strong><br> 20.4</p>
            <p><strong>Velocità media di terminazione round:</strong><br> 90s</p>
        </div>
        <div class="profile-box">
            <h2>All Time Statistics</h2>
            <p><strong>Minimo di parole scritte al minuto:</strong><br> 20.4</p>
            <p><strong>Massimo di parole scritte al minuto:</strong><br> 20.4</p>
            <p><strong>Media di parole scritte al minuto:</strong><br> 20.4</p>
            <p><strong>Percentuale di errore per round:</strong><br> 20.4</p>
            <p><strong>Velocità media di terminazione round:</strong><br> 90s</p>
        </div>
    </div>
</div>

</body>
</html>