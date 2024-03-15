<?php
session_start();

// Verificar si hay una sesión activa que indique que el usuario ha llegado aquí desde tu aplicación
if (!isset($_SESSION['inicio']) || !$_SESSION['inicio']) {
    // Redirigir a otra página si no se ha llegado aquí desde tu aplicación
    header("Location: ./../index.php");
    exit();
}
// Configurar la variable de sesión
$_SESSION['story'] = true;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Survivors of Bellvitge</title>
    <link href="../css/style.css" rel="stylesheet">
</head>
<body class="paginaInicio">

    <button id="musicButton">Music OFF</button>

    <audio id="backgroundMusic" src="../files/intro.mp3" loop hidden></audio>

    <script src="script.js"></script>

    <div id="contenido">

        <h1 id="tituloInicio">Introduce tu nombre</h1>

        <form id="formulario" method="post" action="./story.php">
            <input id="insertaNombre" type="text" name="nombre" placeholder="Nombre" required><br><br>
            <input id="botonNombre" type="submit" value="Enviar">
        </form>

    </div>
</body>
</html>
