<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DattiloKing</title>
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
            text-align: center;
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
        h4{
            color:black
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
<?php
session_start();
$code = isset($_SESSION["code"]) ? $_SESSION["code"] : "Non specificato";$code = isset($_SESSION["code"]) ? $_SESSION["code"] : "Non specificato";
?>
<div class="container mt-5 text-center">
    <div class="sett">
        <a href="<?php echo URL?>play/multiPlayerJoinRoom">
            <img src="<?php echo URL?>application/views/images/back.jpg" alt="Back">
        </a>
    </div>
    <h1 class="title">Lista</h1>
    <div class="profile-container mt-4">
        <div class="profile-box">
            <h2>Lista Utenti</h2>
            <p><strong>1. AB (Tu)</strong></p>
            <p><strong>2. AC</strong></p>
            <p><strong>3. AD</strong></p>
            <p><strong>4. AE</strong></p>
            <p><strong>5. AF</strong></p>
            <!--<table style="border: 1px solid">-->
            <!--    --><?php //foreach ($users as $user): ?>
            <!--    <tr>-->
            <!--        <td>--><?php //echo $user->getUsername()?><!--</td>-->
            <!--        <td>--><?php //echo $user->getPassword()?><!--</td>-->
            <!--        <td>--><?php //echo $user->getCognome()?><!--</td>-->
            <!--    </tr>-->
            <!--    --><?php //endforeach;?>
            <!--</table>-->
            <br>
            <h4>Codice stanza: <?php echo $code; ?></h4>
        </div>
    </div>
</div>
</body>
</html>
