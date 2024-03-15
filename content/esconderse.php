<?php
session_start();

// Verificar si hay una sesión activa que indique que el usuario ha llegado aquí desde tu aplicación
if (!isset($_SESSION['esconderse']) || !$_SESSION['esconderse']) {
    // Redirigir a otra página si no se ha llegado aquí desde tu aplicación
    header("Location: ./../index.php");
    exit();
}

// Configurar la variable de sesión para indicar que el usuario ha pasado por estas páginas
$_SESSION['ha_perdido'] = true;
$_SESSION['pierde_por_tardar'] = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Esconderse</title>
</head>
<body id="entrarFarmacia" class="paginaOpciones">
    <div>
        <?php
            echo "<div id='contenidoOpciones'>";
            echo "<h1 id='decision'></h1><br><br>";
            echo "</div>";
            echo "<script>
                    var decision = document.getElementById('decision');
                    var texto = 'Has intentado esconderte en la farmacia, no es como un laberinto, no tienes muchos escondites... Te han acabado encontrando y les has servido como un buen almuerzo... ';
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

        setTimeout(redirigir, 13000);
        </script>
</body>
</html>