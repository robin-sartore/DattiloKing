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
    </style>
</head>
<body>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <h1 class="title">Dattilo King</h1>
        <p class="subtitle">The best way to learn to write fast</p>
        <button class="btn btn-custom">Single player</button>
        <button class="btn btn-custom">Multi player</button>
        <div class="d-flex gap-3 mt-3">
            <button class="btn btn-custom" style="width: 140px;">Sign In</button>
            <button class="btn btn-custom" style="width: 140px;">Sign Up</button>
            <!--<input class="btn btn-custom" type="submit" value="Sign In">
            <input class="btn btn-custom" type="submit" value="Sign Up"> -->
        </div>
    </div>
</body>
</html>
