<?php
session_start();

// Verificar si hay una sesión activa que indique que el usuario ha llegado aquí desde tu aplicación
if (!isset($_SESSION['ir_al_hospital']) || !$_SESSION['ir_al_hospital']) {
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
        } elseif ($_POST['eleccion'] == 'seguir_pasillo') {
            $_SESSION['pasillo'] = true;
            header("Location: ./pasillo.php");
            exit();
        } elseif ($_POST['eleccion'] == 'abrir_puerta_sellada') {
            $_SESSION['puerta_sellada'] = true;
            header("Location: ./puertatwd.php");
            exit();
        } elseif ($_POST['eleccion'] == 'bajar_morgue') {
            $_SESSION['morgue'] = true;
            header("Location: ./morgue.php");
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
    <title>Hospital</title>
</head>
<body id="entrarHospital" class="paginaOpciones">
    <div>
        <?php
            echo "<div id='contenidoOpciones'>";
            echo "<h1 id='decision'></h1><br><br>";
            echo "<div class='Opciones'>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            echo "<button name='eleccion' value='volver_hotel' id='boton1' style='display:none;'>Volver a la salida del hotel</button>"; // Botón oculto inicialmente
            echo "</form>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            echo "<button name='eleccion' value='seguir_pasillo' id='boton2' style='display:none;'>Seguir por el pasillo</button>"; // Botón oculto inicialmente
            echo "</form>";
            echo "</div>";

            echo "<div class='Opciones'>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            echo "<button name='eleccion' value='abrir_puerta_sellada' id='boton3' style='display:none;'>Abrir la puerta sellada</button>"; // Botón oculto inicialmente
            echo "</form>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            echo "<button name='eleccion' value='bajar_morgue' id='boton4' style='display:none;'>Bajar a la morgue</button>"; // Botón oculto inicialmente
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "<script>
                    var decision = document.getElementById('decision');
                    var texto = 'Has decidido entrar al hospital, por el camino no has tenido problemas. Ahora estas dentro y has explorado un poco. Has encontrado una puerta sellada con tablones en la cual pone DONT DEAD OPEN INSIDE, también has descubierto que hay una morgue a la que puedes bajar.';
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