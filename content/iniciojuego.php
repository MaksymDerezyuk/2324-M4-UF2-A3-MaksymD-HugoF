<?php
session_start();

// Verificar si hay una sesión activa que indique que el usuario ha llegado aquí desde tu aplicación
if (!isset($_SESSION['inicio_juego']) || !$_SESSION['inicio_juego']) {
    // Redirigir a otra página si no se ha llegado aquí desde tu aplicación
    header("Location: ./../index.php");
    exit();
}

// Verificar si se ha enviado el formulario y qué botón se ha presionado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['eleccion'])) {
        if ($_POST['eleccion'] == 'hospital') {
            $_SESSION['ir_al_hospital'] = true;
            header("Location: ./hospital.php");
            exit();
        } elseif ($_POST['eleccion'] == 'barrio') {
            $_SESSION['adentrarte_al_barrio'] = true;
            header("Location: ./barrio.php");
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
    <title>Inicio Juego</title>
</head>
<body id="salirHotel" class="paginaOpciones">
    <div>
        <?php
            echo "<div id='contenidoOpciones'>";
            echo "<h1 id='decision'></h1><br><br>";
            echo "<div class='Opciones'>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            // es necesario que el form se envie a esta misma pagina para que se pueda asignar la variable de sesion en el if, pero ademas debe enviarse a hospital o barrio para continuar
            echo "<button name='eleccion' value='hospital' id='boton1' style='display:none;'>Ir al hospital</button>";
            echo "</form>";
            echo "<form class='dosOpciones' method='post' action='".$_SERVER["PHP_SELF"]."'>";
            echo "<button name='eleccion' value='barrio' id='boton2' style='display:none;'>Adentrarte al barrio</button>";
            echo "</form>";
            echo "</div>";
            echo "</div>";
            echo "<script>
                    var decision = document.getElementById('decision');
                    var texto = 'Has salido del hotel, ahora tienes que decidir por donde empezar a buscar esos suministros. Puedes ir al hospital, esta justo al lado del hotel aunque tiene pinta de ser peligroso. También puedes adentrarte al barrio, alomejor encuentras algo en alguna casa o farmacia. ';
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