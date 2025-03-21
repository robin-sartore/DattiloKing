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
    </style>
</head>
<body>
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
                <form action="<?php echo URL?>login/logInManage" method="POST">
                <input type="text" class="form-control mb-3" placeholder="Username" name="username">
                <input type="password" class="form-control mb-3" placeholder="Password" name="password">
                <input class="btn btn-dark w-100" type="submit" value="SIGN IN">
                </form>
            </div>
            <div class="tab-pane fade" id="sign-up" role="tabpanel">
                <form action="<?php echo URL?>signup/signUpManage" method="POST">
                <input type="text" class="form-control mb-3" placeholder="Username" name="username">
                <input type="password" class="form-control mb-3" placeholder="Password" name="password">
                <input type="password" class="form-control mb-3" placeholder="Confirm Password" name="passwordConfirm">
                <input class="btn btn-dark w-100" type="submit" value="SIGN UP">
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>