<?php
session_start();

// Verificar si hay una sesión activa que indique que el usuario ha llegado aquí desde tu aplicación
if (!isset($_SESSION['puerta_misteriosa']) || !$_SESSION['puerta_misteriosa']) {
    // Redirigir a otra página si no se ha llegado aquí desde tu aplicación
    header("Location: ./../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Puerta Misteriosa</title>
</head>
<body id="entrarPasillo" class="paginaOpciones">
    <div>
        <div id="contenidoOpciones">
            <h1 id="decision"></h1><br><br>
            <div class="Opciones">
                <form class="codigo">
                    <label id="textoCodigo" style="display: none;" for="numero">PANEL DE LA PUERTA:</label><br>
                    <input type="text" style="display: none;" id="numero" name="numero"><br>
                    <button type="button" style="display: none;" id="enviar">Probar</button><br>
                </form>
                <form class="dosOpciones" method="post" action="./hospital.php">
                    <button id="boton2" style="display:none;">Irte a la entrada del hospital</button>
                </form>
            </div>
        </div>
        <script>
            var decision = document.getElementById('decision');
            var texto = 'Te has acercado a la puerta para intentar abrirla, tiene pinta de contener algo muy valioso si esta tan fortificada, pero cual podria ser el codigo?';
            var index = 0;
            function mostrarLetras() {
                if (index < texto.length) {
                    decision.textContent += texto.charAt(index);
                    index++;
                    setTimeout(mostrarLetras, 50);
                } else {
                    document.getElementById('numero').style.display = 'block';
                    document.getElementById('enviar').style.display = 'block';
                    document.getElementById('textoCodigo').style.display = 'block';
                    document.getElementById('boton2').style.display = 'block';
                }
            }
            mostrarLetras();

            // Agregar evento onclick al botón "Probar"
            document.getElementById('enviar').onclick = function() {
                var numeroUsuario = document.getElementById('numero').value;
                var numeroCorrecto = 47250;
                if (parseInt(numeroUsuario) === numeroCorrecto) {
                    // Si el número es correcto, redirigir a otra página
                    window.location.href = './cura.php';
                    // Y asigna variable de sesion de la cura
                    <?php
                    $_SESSION['tienes_la_cura'] = true;
                    ?>
                } else {
                    // Mostrar mensaje de error
                    alert('Cerca del panel hay una nota que dice lo siguiente: Dias y personas');
                }
            };
        </script>
    </div>
</body>
</html>
