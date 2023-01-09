<meta charset="utf-8">
<?php header('Access-Control-Allow-Origin: *'); ?>

<head>
    <meta name="viewport" content="width=device-width">
    <title>repl.it</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js">
    </script>
</head>

<style>
    body {
        background-color: #28223F;
        font-family: Montserrat, sans-serif;

        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;

        min-height: 100vh;
        margin: 0;
    }

    .contenedor {
        text-align: center;
        padding-top: 0%;
        left: 50%;
    }

    .labelnip {
        font: 200% sans-serif;
        color: black;

    }

    .inputNip {
        border: 1px solid #2e518b;
        /*anchura, estilo y color borde*/
        padding: 10px;
        /*espacio alrededor texto*/
        text-transform: uppercase;
        /*capitalización texto*/
        font-family: 'Helvetica', sans-serif;
        /*tipografía texto*/
        border-radius: 50px;
        /*bordes redondos*/
        background-color: #03BFCB;
        border: 1px solid #03BFCB;
        color: #231E39;
    }

    .btnIngresar {
        width: 150px;
        height: 40px;

    }
</style>

<body>
    <div class="contenedor">
        <div>
            <img src="img/user.png" alt="user" width="100" height="100">
        </div><br>

        <form action="iniciarSesion.php" method="GET">
            <div class="inputs">
                <!-- <label for="" class="labelnip">Ingresa tu NIP</label> -->
                <br><br>
                <input name="no_cuenta" type="text" id="" class="inputNip" placeholder="No de cuenta"><br><br>
                <input name="nip" type="password" id="txtNip" class="inputNip" placeholder="NIP" />
                <br><br>
                <button type="submit" class="btnIngresar">Ingresar</button>
            </div>
        </form>
    </div>
</body>