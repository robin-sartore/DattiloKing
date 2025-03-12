<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tastiera Virtuale</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
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

        .mt-5{
            font-size: 10rem;
            font-weight: bold;
            color: red;
        }

        #key-space {
            width: 50%;
        }

        .frase{
            color: white;
            font-size: 50px;
            width: 65%;
            margin-right: auto;
            margin-left: auto;
            text-align: justify;
            margin-top: 80px;
        }
    </style>
</head>
<body onload="stampaTesto()">
<div class="frase" id="frase">

</div>
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
    document.addEventListener('keydown', function(event) {
        let key = event.key.toUpperCase();
        if (key === " ") key = "space";
        if (key === ",") key = "comma";
        if (key === ".") key = "point";
        const button = document.getElementById('key-' + key);
        if (button) {
            button.classList.add('pressed');
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
    });


    function stampaTesto(){
        fetch('../../php_mvc/application/controller/phrase.php')
            .then(response => response.text())
            .then(data => {
                document.getElementById("frase").innerText = data;

                let indiceLettera = 0;
                let fraseArray = data.split(""); // Converte la frase in un array di caratteri
                let letteraPrima;
                if (indiceLettera >= fraseArray.length) return;

                let prossimaLettera = fraseArray[indiceLettera];
                if (prossimaLettera.toLowerCase() === data.toLowerCase()) {
                    fraseArray[indiceLettera] = `<span class="highlight">${prossimaLettera}</span>`;
                    indiceLettera++;
                }
                else{
                    fraseArray[indiceLettera] = `<span class="wrong">${prossimaLettera}</span>`;
                    indiceLettera++;
                }



                document.getElementById("frase").innerHTML = fraseArray.join("");
            })
            .catch(error => console.error('Errore:', error));
    }


</script>
</body>
</html>