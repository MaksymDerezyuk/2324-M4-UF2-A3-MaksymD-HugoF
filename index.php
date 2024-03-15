<?php
session_start();

// Configurar la variable de sesión para indicar que el usuario ha pasado por estas páginas
$_SESSION['inicio'] = true;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Survivors of Bellvitge</title>
    <link href="./css/style.css" rel="stylesheet">
</head>
<body class="paginaInicio">
    <!-- Botón de encendido/apagado de la música -->
    <button id="musicButton">Music OFF</button>
    
    <audio id="backgroundMusic" src="./files/intro.mp3" loop hidden></audio>
    
    <h1 id="tituloInicio">THE SURVIVORS OF BELLVITGE</h1>
    <form method="post" action="./content/name.php">
        <button id="botonIniciar" type="submit" name="start" >START</button>
    </form>

    <script src="./content/script.js"></script>
</body>
</html>



