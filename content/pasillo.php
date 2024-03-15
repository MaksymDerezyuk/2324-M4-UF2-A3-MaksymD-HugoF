<?php
session_start();

// Verificar si hay una sesión activa que indique que el usuario ha llegado aquí desde tu aplicación
if (!isset($_SESSION['pasillo']) || !$_SESSION['pasillo']) {
    // Redirigir a otra página si no se ha llegado aquí desde tu aplicación
    header("Location: ./../index.php");
    exit();
}

// Verificar si se ha enviado el formulario y qué botón se ha presionado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['eleccion'])) {
        if ($_POST['eleccion'] == 'entrar_quirofano') {
            $_SESSION['quirofano'] = true;
            header("Location: ./quirofano.php");
            exit();
        } elseif ($_POST['eleccion'] == 'acercarte_puerta_misteriosa') {
            $_SESSION['puerta_misteriosa'] = true;
            header("Location: ./puertamisteriosa.php");
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
    <title>Pasillo</title>
</head>
<body id="entrarPasillo" class="paginaOpciones">
    <div>
        <?php
            echo "<div id='contenidoOpciones'>";
            echo "<h1 id='decision'></h1><br><br>";
            echo "<div class='Opciones'>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            echo "<button name='eleccion' value='entrar_quirofano' id='boton1' style='display:none;'>Entrar en el quirofano</button>"; // Botón oculto inicialmente
            echo "</form>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            echo "<button name='eleccion' value='acercarte_puerta_misteriosa' id='boton2' style='display:none;'>Acercarte a la puerta misteriosa</button>"; // Botón oculto inicialmente
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "<script>
                    var decision = document.getElementById('decision');
                    var texto = 'Has acabado en un pasillo muy largo con muchas puertas a los lados. Pero el camino esta bloqueado por escombros y solo puedes acceder a dos salas: una de las puertas te lleva al quirofano y la otra... es... extraña, tiene mayor seguridad, un panel de seguridad con código para poder acceder.';
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
</body>
</html>