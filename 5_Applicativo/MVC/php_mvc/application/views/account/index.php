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
        }
        .title {
            font-size: 8rem;
            font-weight: bold;
            color: #d41c1c;
        }
        .subtitle {
            font-size: 2.5rem;
        }
        .card {
            background-color: #d3d3d3;
            padding: 2rem;
            border-radius: 15px;
            width: 500px;
        }
        .nav-pills {
            background-color: #b0a9a9;
            border-radius: 30px;
            padding: 5px;
            font-size: 1.2rem;
        }
        .nav-pills .nav-link {
            border-radius: 30px;
            transition: all 0.3s ease;
            padding: 10px 20px;
        }
        .nav-pills .nav-link.active {
            background-color: white;
            color: black;
        }
        .form-control {
            font-size: 1.2rem;
            padding: 12px;
            border-radius: 8px;
        }
        .btn {
            font-size: 1.5rem;
            padding: 12px;
            border-radius: 8px;
        }
        .btn-danger {
            background-color: #b30000;
            border: none;
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
<div class="sett">

    <a href="<?php echo URL?>home/notLogged" onclick="saveAudioProgress()">
        <img src="<?php echo URL?>application/views/images/back.jpg" alt="Back">
    </a>
</div>
<div class="container vh-100 d-flex flex-column justify-content-center align-items-center">
    <h1 class="title">Dattilo King</h1>
    <p class="subtitle">The best way to learn to write fast</p>

    <div class="card shadow mt-3">
        <h3 class="mb-3 fw-bold" style="font-size: 2rem;">Login Type</h3>


        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="sign-in-tab" data-bs-toggle="pill" data-bs-target="#sign-in" type="button" role="tab">Sign In</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="sign-up-tab" data-bs-toggle="pill" data-bs-target="#sign-up" type="button" role="tab">Sign Up</button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="sign-in" role="tabpanel">
                <form id="signin-form" action="<?php echo URL?>signin/signInManage" method="POST" onsubmit="return validateSignIn();">
                    <input type="text" class="form-control mb-3" placeholder="Username" name="username" id="signin-username">
                    <input type="password" class="form-control mb-3" placeholder="Password" name="password" id="signin-password">
                    <input class="btn btn-dark w-100" type="submit" value="SIGN IN">
                </form>

            </div>
            <div class="tab-pane fade" id="sign-up" role="tabpanel">
                <form id="signup-form" action="<?php echo URL?>signup/signUpManage" method="POST" onsubmit="return validateSignUp();">
                    <input type="text" class="form-control mb-3" placeholder="Username" name="username" id="signup-username">
                    <input type="password" class="form-control mb-3" placeholder="Password" name="password" id="signup-password">
                    <input type="password" class="form-control mb-3" placeholder="Confirm Password" name="passwordConfirm" id="signup-passwordConfirm">
                    <input class="btn btn-dark w-100" type="submit" value="SIGN UP">
                </form>
            </div>
        </div> <br>
        <div id="errors"></div>
    </div>
</div>

<audio id="background-audio" loop>
    <source src='<?php echo URL?>application/views/audio/audio.mp3' type="audio/mpeg">
</audio>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>

    const audio = document.getElementById("background-audio");

    // Recupera i progressi salvati
    window.onload = () => {
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

    function validateSignUp() {
        var username = document.getElementById("signup-username").value.trim();
        var password = document.getElementById("signup-password").value.trim();
        var passwordConfirm = document.getElementById("signup-passwordConfirm").value.trim();
        var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{8,}$/;


        if (!username && !password) {
            document.getElementById("errors").innerHTML = "Inserisci username e password!";
            return false;
        }

        if(!username){
            document.getElementById("errors").innerHTML = "Lo username non può essere vuoto!";
            return false;
        }

        if (!password) {
            document.getElementById("errors").innerHTML = "La password non può essere vuota!";
            return false;
        }

        if (!regex.test(password)) {
            document.getElementById("errors").innerHTML = "La password deve rispettare:\n- Almeno una lettera maiuscola\n- Almeno una lettera minuscola\n- Almeno un numero\n- Almeno un carattere speciale\n- Almeno 8 caratteri di lunghezza";
            return false;
        }

        if (password !== passwordConfirm) {
            document.getElementById("errors").innerHTML = "Le password non coincidono!";
            return false;
        }

        var formData = new FormData(document.getElementById("signup-form"));

        fetch('<?php echo URL; ?>signup/signUpManage', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.error === 'user_exists') {
                    document.getElementById("errors").innerHTML = "L'utente esiste già!";
                } else if (data.success) {
                    window.location.href = "<?php echo URL; ?>home/logged";
                }
            })

        return false;
    }
    function validateSignIn() {
        var username = document.getElementById("signin-username").value.trim();
        var password = document.getElementById("signin-password").value.trim();

        if (!username && !password) {
            document.getElementById("errors").innerHTML = "Inserisci username e password!";
            return false;
        }

        if(!username){
            document.getElementById("errors").innerHTML = "Lo username non può essere vuoto!";
            return false;
        }

        if (!password) {
            document.getElementById("errors").innerHTML = "La password non può essere vuota!";
            return false;
        }

        var formData = new FormData(document.getElementById("signin-form"));

        fetch('<?php echo URL; ?>signin/signInManage', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                if (data.error === 'user_not_exists') {
                    document.getElementById("errors").innerHTML = "Utente non esiste o Credenziali non valide!";
                } else if (data.success) {
                    window.location.href = "<?php echo URL; ?>home/logged";
                }
            })

        return false;
    }
</script>

</body>
</html>