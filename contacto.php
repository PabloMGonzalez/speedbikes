<!DOCTYPE html>
<html lang="es">

<?php
require_once 'inc/conn.php';
require_once('inc/session.php');
include("encabezado.php");
include("pie.php");

generar_tit($titulo);
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Speedbikes Contacto</title>

    <!-- <meta name="description" content="breve descripcion del sitio">
    <meta name="keywords" content="palabraclave1,palabraclave2,palabraclave3">
    <meta name="robots" content="index,nofollow"> -->

    <link rel="shortcut icon" href="images/Logo-Speed-Bikes.png" type="image/x-icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/all.min.css">
    <!-- jQuery first, then Popper.js (incluido en .blunde.min.js), then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">

        <header>
            <?php echo crear_barra(0);?>
            <div id="encab">
                <?=$titulo?>
            </div>
        </header>

        <div class="div_ini">
            <h3> Sobre nosotros</h3>
            <p>
                Somos una empresa de jovenes adictos a las bicicletas.
            </p>
        </div>

        <div class="div_ini">

            <div classs="div_ini">

                <h3>Contactanos!</h3>
                <br>
                <p><strong>Direccion:</strong> Tomás Mate 1506, Bahia Blanca</p><br />
                <p><strong>Telefono:</strong> 455-9684</p><br />
            </div>

            <form id="contacto" action="" method="post" novalidate>

                <fieldset class="">
                    <legend class="form-group">Tu consulta no molesta:</legend>

                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" value="" maxlength="35" title="Ingrese nombre"
                        required>
                    <br>
                    <label for="mail">E-Mail:</label>
                    <input type="text" id="mail" name="mail" value="" maxlength="35" title="Ingrese un mail" required>
                    <br>
                    <label for="asunto">Asunto:</label>
                    <input type="text" id="asunto" name="asunto" value="" maxlength="35" title="Asunto" required>
                    <br>
                    <label for="mensaje">Mensaje:</label>
                    <textarea name="" id="" cols="60" rows="8" maxlength="500"></textarea>
                    <input type="submit" name="enviar" value="Enviar Consulta" style="text-align:left;">

                </fieldset>
            </form>

        </div>
        <br class=" clear">
        </main>

        <footer>
            <?=pie()?>
        </footer>
    </div>
</body>

</html>