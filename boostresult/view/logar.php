<?php 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" media="screen" href="../particles.js-master/demo/css/style.css">
    <style>
        
        * {
            margin: 0px;
            padding: 0px;
        }

        body {
            color: #269126;
            
        }

        img {
            width: 40%;
            position: absolute;
            top: 60px;
            left: 500px;
        }

        div#divCentral {
            background-color: rgba(0, 0, 0, 0.24);
            width: 50vw;
            height: 700px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 20px;
            color: white;
            backdrop-filter: blur(3px); /* Aplica o blur */
            -webkit-backdrop-filter: blur(3px); /* Suporte para Safari */
        }

        div h1 {
            margin-left: 10%;
            margin-top: 60px;
            color: white;
            font-size: 30px;
        }

        div form {
            margin-left: 10%;
            margin-top: 40px;
        }

        label {
            margin: 20px 0px;
        }

        input {
            color: white;
            padding: 10px;
        }

        select {
            color: white;
          
        }

        option {
            color: black;
        }

        input, select {
            background-color:rgba(202, 202, 202, 0.18);
            width: 400px;
            height: 30px;
            border: 2px solid #269126;
            border-radius: 10px;
        }

        #LOGAR {
            width: 100px;
            height: 40px;
            color: white;
            background-color: #269126;
            border: none;
        }

        a{
            text-decoration: none;
            color: white;
            margin-left: 10%;
        }

        a:hover {
            color: #269126;
            text-decoration: none;
        }

        /* TABLET */

        @media(max-width: 1638px) {
            img {
                width: 1px;
            }   
            
            input, select {
                width: 90%;
            }

            div h1 {
                text-align: center;
                margin: 60px 0px;
            }

        }

        @media(max-width: 976px) {
            img {
                width: 1px;
            }   
            
            input, select {
                width: 90%;
            }

            div h1 {
                text-align: center;
                margin: 60px 0px;
            }

            div#divCentral {
                width: 90vw;
            }

        }


        /* CELULAR */

        @media(max-width: 574px) {
            div#divCentral {
                width: 90vw;
            }
        }

    </style>
</head>
<body>
    <!-- particles.js container -->
    <div id="particles-js"></div>

    <!-- scripts -->
    <script src="../particles.js-master/particles.js"></script>
    <script src="../particles.js-master/demo/js/app.js"></script>

    <!-- stats.js -->
    <script src="../particles.js-master/demo/js/lib/stats.js"></script>
    <script>
    var count_particles, stats, update;
    stats = new Stats;
    stats.setMode(0);
    stats.domElement.style.position = 'absolute';
    stats.domElement.style.left = '0px';
    stats.domElement.style.top = '0px';
    document.body.appendChild(stats.domElement);
    count_particles = document.querySelector('.js-count-particles');
    update = function() {
        stats.begin();
        stats.end();
        if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) {
        count_particles.innerText = window.pJSDom[0].pJS.particles.array.length;
        }
        requestAnimationFrame(update);
    };
    requestAnimationFrame(update);
    </script>

        
    <div id="divCentral">
        <h1>ENTRE NA SUA CONTA</h1>

            <form action="../app/controller/UsuarioController.php" method="POST">
                <label for="email">EMAIL</label><br><input type="text" id="email" name="email" required><br>
                <label for="senha">SENHA</label><br><input type="password" id="senha" name="senha" required><br><br>
                <input type="submit" value="LOGAR" id="LOGAR" name="acao">
            </form>
            <img src="../imagens/HomemMusculoso.png" alt="">
            <br><br>
            <a href="cadastrar.php">Não possui uma conta? Clique aqui.</a>
    </div>

    
</body>

</html>