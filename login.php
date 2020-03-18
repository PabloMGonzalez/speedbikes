<!DOCTYPE html>
<html lang="es">
<?php

require_once 'inc/conn.php';
require_once('inc/session.php');
include("encabezado.php");
include("pie.php");

generar_tit($titulo);
//generar_menu($menu_ppal, 0);
//generar_breadcrumbs($camino_nav,0,"Inicio");
?>

<head>
    <meta charset="utf-8">

    <title>Login Speedbikes</title>

    <!-- <meta name="description" content="breve descripcion del sitio">
	<meta name="keywords" content="palabraclave1,palabraclave2,palabraclave3">
	<meta name="robots" content="index,nofollow" > -->

    <link rel="shortcut icon" href="images/Logo-Speed-Bikes.png" type="image/x-icon" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/all.min.css">

    <script>
    function validar() {
        var errores;

        errores = 0;

        // validar datos 

        if (errores == 0) {
            return true;
        } else {
            return false;
        }
    }
    </script>

</head>

<body>

    <header>

        <?php echo crear_barra(0);?>
        <nav id="encab">
            <?=$titulo?>
            <!-- <?=$menu_ppal?> -->
        </nav>

    </header>

    <main id="cuerpo">

        <?//= $camino_nav?>

        <h2>Iniciar Sesión</h2>

        <form action="iniciar_session.php" method="post" onsubmit="return validar()">
            <fieldset>
                <legend>Datos</legend>
                <label for="id_cliente">Mail</label>
                <input type="text" name="id_cliente" id="id_cliente" value="" maxlength="50"><br>
                <label for="psw">Contraseña</label>
                <input type="password" name="psw" id="psw" value="" maxlength="20"><br>
            </fieldset>

            <fieldset id="btn" style="text-align:right;">
                <legend>&nbsp;</legend>
                <input type="submit" name="iniciar" value="Iniciar Sesión">
                <input type="button" name="registrarse" value="Registrarse" onclick="window.location='register.php'">

            </fieldset>
        </form>

        <a href=" #">&raquo; Recuperar Contraseña</a>

    </main>

    <footer>
        <?=pie()?>
    </footer>

</body>

</html>