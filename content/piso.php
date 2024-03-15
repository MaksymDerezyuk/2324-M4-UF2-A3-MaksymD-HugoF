<?php
session_start();

// Verificar si hay una sesión activa que indique que el usuario ha llegado aquí desde tu aplicación
if (!isset($_SESSION['piso']) || !$_SESSION['piso']) {
    // Redirigir a otra página si no se ha llegado aquí desde tu aplicación
    header("Location: ./../index.php");
    exit();
}

// Configurar la variable de sesión para indicar que el usuario ha pasado por estas páginas
$_SESSION['ha_ganado'] = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Piso</title>
</head>
<body id="entrarPiso" class="paginaOpciones">
    <div>
        <?php
            echo "<div id='contenidoOpciones'>";
            echo "<h1 id='decision'></h1><br><br>";
            echo "</div>";
            echo "<script>
                    var decision = document.getElementById('decision');
                    var texto = 'Has entrado en un piso aleotorio, la mayoria de pisos en Bellvitge ya han sido saqueados aunque este tiene pinta de tener algo. Has seguido mirando en los cajones, armarios, etc...          Despues de tanto buscar te has cansado y has decidido sentarte en el sofa cuando de repente notas que el cuadro que tienes enfrente es peculiar. Decides acercarte a el y resulta que detras tenia ocutlo UN BOTIQUIN ENTERO! Has logrado tu tarea de hoy! ';
                    var index = 0;
                    function mostrarLetras() {
                        if (index < texto.length) {
                            decision.textContent += texto.charAt(index);
                            index++;
                            setTimeout(mostrarLetras, 50); // Cambia 50 por el tiempo de retraso deseado en milisegundos
                        } else {
                            document.getElementById('boton1').style.display = 'block';
                            document.getElementById('boton2').style.display = 'block';
                        }
                    }
                    mostrarLetras();
                  </script>";
        ?>
        <script>
        function redirigir() {
            window.location.href = './goodending.php';
        }

        setTimeout(redirigir, 30000);
        </script>
</body>
</html>