<?php
session_start();

// Verificar si hay una sesión activa que indique que el usuario ha llegado aquí desde tu aplicación
if (!isset($_SESSION['farmacia']) || !$_SESSION['farmacia']) {
    // Redirigir a otra página si no se ha llegado aquí desde tu aplicación
    header("Location: ./../index.php");
    exit();
}

// Verificar si se ha enviado el formulario y qué botón se ha presionado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['eleccion'])) {
        if ($_POST['eleccion'] == 'esconderse_farmacia') {
            $_SESSION['esconderse'] = true;
            header("Location: ./esconderse.php");
            exit();
        } elseif ($_POST['eleccion'] == 'correr') {
            $_SESSION['correr'] = true;
            header("Location: ./correr.php");
            exit();
        }
    }
}

// Configurar la variable de sesión para indicar que el usuario ha pasado por estas páginas
$_SESSION['pierde_por_tardar'] = true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Farmacia</title>
</head>
<body id="entrarFarmacia" class="paginaOpciones">
    <div>
        <?php
            echo "<div id='contenidoOpciones'>";
            echo "<h1 id='decision'></h1><br><br>";
            echo "<div class='Opciones'>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            echo "<button name='eleccion' value='esconderse_farmacia' id='boton1' style='display:none;'>Esconderse</button>"; // Botón oculto inicialmente
            echo "</form>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            echo "<button name='eleccion' value='correr' id='boton2' style='display:none;'>Correr</button>"; // Botón oculto inicialmente
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "<script>
                    var decision = document.getElementById('decision');
                    var texto = 'Has decidido entrar en la far-                        Espera...                 que es ese ruido...?                   Oh no...                    RAPIDO HAZ ALGO O SI NO MORIRAS POR ELLOS!!';
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
            window.location.href = './tardar.php';
        }

        // Temporizador de 20 segundos
        setTimeout(redirigir, 20000); // 20 segundos en milisegundos
        </script>
</body>
</html>