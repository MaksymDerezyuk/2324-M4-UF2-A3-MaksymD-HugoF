<?php
session_start();

// Verificar si hay una sesión activa que indique que el usuario ha llegado aquí desde tu aplicación
if (!isset($_SESSION['tienes_la_cura']) || !$_SESSION['tienes_la_cura']) {
    // Redirigir a otra página si no se ha llegado aquí desde tu aplicación
    header("Location: ./../index.php");
    exit();
}

// Configurar la variable de sesión para indicar que el usuario ha pasado por estas páginas
$_SESSION['final_secreto'] = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Cura</title>
</head>
<body id="fondonegro" class="paginaOpciones">
    <div>
        <?php
            echo "<div id='contenidoOpciones'>";
            echo "<h1 id='decision'></h1><br><br>";
            echo "</div>";
            echo "<script>
                    var decision = document.getElementById('decision');
                    var texto = 'Lo has logrado! Has entrado! Te has adentrado a la habitacion, dentro de ella solo hay un maletin. Te has acercado al maletin y lo has abierto, no podias creerte lo que estabas viendo con tus ojos. Tenias en tus manos la cura, pero quien la ha dejado ahi escondida y encerrada...??';
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
            window.location.href = './secretending.php';
        }

        setTimeout(redirigir, 20000);
        </script>
</body>
</html>