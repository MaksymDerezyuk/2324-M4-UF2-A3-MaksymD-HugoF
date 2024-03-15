<?php
session_start();

// Verificar si hay una sesión activa que indique que el usuario ha perdido por tardar
if (!isset($_SESSION['pierde_por_tardar']) || !$_SESSION['pierde_por_tardar']) {
    // Redirigir a otra página si no se ha llegado aquí después de perder
    header("Location: ./../index.php");
    exit(); // Asegurar que el script se detenga después de la redirección
}

// Configurar la variable de sesión para indicar que el usuario ha perdido 
$_SESSION['ha_perdido'] = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Tardar</title>
</head>
<body id="fondonegro" class="paginaOpciones">
    <div>
        <?php
            echo "<div id='contenidoOpciones'>";
            echo "<h1 id='decision'></h1><br><br>";
            echo "</div>";
            echo "<script>
                    var decision = document.getElementById('decision');
                    var texto = 'Has tardado en decidir el que hacer y ellos te acabaron devorando...';
                    var index = 0;
                    function mostrarLetras() {
                        if (index < texto.length) {
                            decision.textContent += texto.charAt(index);
                            index++;
                            setTimeout(mostrarLetras, 50); // Cambia 50 por el tiempo de retraso deseado en milisegundos
                        }
                    }
                    mostrarLetras();
                  </script>";
        ?>
        <script>
        function redirigir() {
            window.location.href = './badending.php';
        }

        setTimeout(redirigir, 6000);
        </script>
</body>
</html>