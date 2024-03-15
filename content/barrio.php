<?php
session_start();

// Verificar si hay una sesión activa que indique que el usuario ha llegado aquí desde tu aplicación
if (!isset($_SESSION['adentrarte_al_barrio']) || !$_SESSION['adentrarte_al_barrio']) {
    // Redirigir a otra página si no se ha llegado aquí desde tu aplicación
    header("Location: ./../index.php");
    exit();
}

// Verificar si se ha enviado el formulario y qué botón se ha presionado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['eleccion'])) {
        if ($_POST['eleccion'] == 'volver_hotel') {
            $_SESSION['inicio_juego'] = true;
            header("Location: ./iniciojuego.php");
            exit();
        } elseif ($_POST['eleccion'] == 'entrar_farmacia') {
            $_SESSION['farmacia'] = true;
            header("Location: ./farmacia.php");
            exit();
        } elseif ($_POST['eleccion'] == 'entrar_piso') {
            $_SESSION['piso'] = true;
            header("Location: ./piso.php");
            exit();
        } elseif ($_POST['eleccion'] == 'explorar') {
            $_SESSION['seguir_barrio'] = true;
            header("Location: ./seguirbarrio.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Barrio</title>
</head>
<body id="entrarBarrio" class="paginaOpciones">
    <div>
        <?php
            echo "<div id='contenidoOpciones'>";
            echo "<h1 id='decision'></h1><br><br>";
            echo "<div class='Opciones'>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            echo "<button name='eleccion' value='volver_hotel' id='boton1' style='display:none;'>Volver a la salida del hotel</button>"; 
            echo "</form>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            echo "<button name='eleccion' value='entrar_farmacia' id='boton2' style='display:none;'>Entrar en la farmacia</button>"; 
            echo "</form>";
            echo "</div>";

            echo "<div class='Opciones'>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            echo "<button name='eleccion' value='entrar_piso' id='boton3' style='display:none;'>Entrar en algun piso</button>"; 
            echo "</form>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            echo "<button name='eleccion' value='explorar' id='boton4' style='display:none;'>Seguir explorando</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "<script>
                    var decision = document.getElementById('decision');
                    var texto = 'Has decidido adentrarte al barrio, parece estar tranquilo... Has seguido caminando e investigando. Ahora tienes 4 opciones: ir a la farmacia, entrar en algun piso, seguir explorando más al fondo o volver para ir al hospital. Recuerda una mala decisión puede costarte la vida... ';
                    var index = 0;
                    function mostrarLetras() {
                        if (index < texto.length) {
                            decision.textContent += texto.charAt(index);
                            index++;
                            setTimeout(mostrarLetras, 50); // Cambia 50 por el tiempo de retraso deseado en milisegundos
                        } else {
                            document.getElementById('boton1').style.display = 'block';
                            document.getElementById('boton2').style.display = 'block';
                            document.getElementById('boton3').style.display = 'block';
                            document.getElementById('boton4').style.display = 'block';
                        }
                    }
                    mostrarLetras();
                  </script>";
        ?>
</body>
</html>