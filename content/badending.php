<?php
session_start();

// Verificar si hay una sesión activa que indique que el usuario ha llegado aquí desde tu aplicación
if (!isset($_SESSION['ha_perdido']) || !$_SESSION['ha_perdido']) {
    // Redirigir a otra página si no se ha llegado aquí desde tu aplicación
    header("Location: ./../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['eleccion'])) {
        if ($_POST['eleccion'] == 'reiniciar_juego') { // Cambiado el valor del botón para que coincida
            session_destroy();
            header("Location: ./../index.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bad Ending</title>
    <link rel="stylesheet" href="./../css/style.css" type="text/css">
</head>
<body id="EndingBody">
    <h1 id="badEndingTitle">BAD ENDING</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> <!-- Cambiado el action -->
        <button name='eleccion' value='reiniciar_juego' id="musicButton">REINICIAR JUEGO</button>
    </form>
</body>
</html>
