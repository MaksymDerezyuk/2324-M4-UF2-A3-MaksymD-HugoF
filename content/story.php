<?php
session_start();

// Verificar si hay una sesión activa que indique que el usuario ha llegado aquí desde tu aplicación
if (!isset($_SESSION['story']) || !$_SESSION['story']) {
    // Redirigir a otra página si no se ha llegado aquí desde tu aplicación
    header("Location: ./../index.php");
    exit();
}
// Configurar la variable de sesión
$_SESSION['inicio_juego'] = true;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia</title>
    <link href="../css/style.css" rel="stylesheet">
</head>
<body class="paginaInicio">

<div id="divHistoria">
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    // Mostrar la historia con el nombre ingresado
    echo "<div id='contenido'>";
    echo "<h1 id='historia'></h1><br><br>";
    echo "<form method='post' action='./iniciojuego.php'>";
    echo "<button id='botonIniciar' style='display:none;'>Siguiente</button>"; // Botón oculto inicialmente
    echo "</form>";
    echo "</div>";
    echo "<script>
            var historia = document.getElementById('historia');
            var texto = 'Tu nombre es $nombre, han pasado 47 días desde que tu mundo cambió por completo. Como minimó sabes que más del 80% de la población del mundo ha sido... bueno... ya no están. Eres uno de los 250 supervivientes de Bellvitge que ha decidido refugirase en el Hotel Hesperia. Para que dicho refugio siga avanzando, cada uno tiene tareas. Tu tarea de hoy es conseguir suministros medicos... Lograras ver el amanecer una dia más? ';
            var index = 0;
            function mostrarLetras() {
                if (index < texto.length) {
                    historia.textContent += texto.charAt(index);
                    index++;
                    setTimeout(mostrarLetras, 50); // Cambia 50 por el tiempo de retraso deseado en milisegundos
                } else {
                    document.getElementById('botonIniciar').style.display = 'block'; // Mostrar el botón cuando se complete la animación
                }
            }
            mostrarLetras();
          </script>";
} else {
    // Si no se ha enviado el formulario correctamente, redirigir a name.php
    header("Location: name.php");
    exit();
}
?>
</div>
</body>
</html>


