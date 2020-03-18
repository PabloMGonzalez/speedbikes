<!DOCTYPE html>
<html lang="es">

<?php
require_once 'inc/conn.php';
require_once('inc/session.php');
include("encabezado.php");
include("pie.php");

generar_tit($titulo);
//generar_menu($menu_ppal,1);

?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Speedbikes</title>

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

        <main id="cuerpo">

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block" style="width: 1000px; height:500px" src=" images/BMX.jpg" alt="BMX">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" style="width: 1000px; height:500px" src="images/MTB.jpg" alt="MTB">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" style="width: 1000px; height:500px" src="images/URBANA.jpg" alt="URBANA">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" style="width: 1000px; height:500px" src="images/MTB-2.jpg" alt="MTB">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" style="width: 1000px; height:500px" src="images/BMX-1.jpg" alt="BMX">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" style="width: 1000px; height:500px" src="images/RUTA.jpg" alt="RUTA">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" style="width: 1000px; height:500px" src="images/PLEGABLE.jpg"
                            alt="PLEGABLE">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" style="width: 1000px; height:500px" src="images/MTB-1.jpg" alt="MTB">
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>


            <div class="container">

                <br>
                <div class="div_ini1">
                    <h3> Ultimos Productos</h3>
                </div>


                <div class="container">

                    <div class="row">
                        <div class="col">
                            <div class="imagebox">
                                <a href="Detalle_Bicicleta.php"><img
                                        src="Bicicletas/bicicleta-cube-attain-sl-(2018).jpg"
                                        class="w-AUTO img-thumbnail" alt="bicicleta"></a>
                                <span class="imagebox-desc">Cube Attain SL <br> $98.516</span>
                            </div>
                        </div>

                        <div class="col">
                            <div class="imagebox">
                                <a href="Detalle_Bicicleta.php"><img src="Bicicletas/bicicleta-cube-attention.jpg2.jpg"
                                        class="w-AUTO img-thumbnail" alt="bicicleta"></a>
                                <span class="imagebox-desc">Cube Attention 29 (2018) <br> $81.258</span>
                            </div>
                        </div>

                        <div class="col">
                            <div class="imagebox">
                                <a href="detalle_bicicleta.php"><img src="Bicicletas/bicicleta-haro-midway.jpg"
                                        class="w-AUTO img-thumbnail" alt="bicicleta"></a>
                                <span class="imagebox-desc">Haro Midway <br> $40.939</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="imagebox">
                                <a href="detalle_bicicleta.php"><img
                                        src="Bicicletas/bicicleta-nitro-abril-paseo-r26-celeste.jpg"
                                        class="w-AUTO img-thumbnail" alt="bicicleta"></a>
                                <span class="imagebox-desc">Nitro Abril Paseo R26 <br> $10.082</span>
                            </div>
                        </div>
                    </div>

                    <br class="clear">

                    <div class="row">
                        <div class="col">
                            <div class="imagebox">
                                <a href="detalle_bicicleta.php"><img
                                        src="Bicicletas/bicicleta-olmo-amelie-plume-rapide.jpg"
                                        class="w-AUTO img-thumbnail" alt="bicicleta"></a>
                                <span class="imagebox-desc">Olmo Amelie Plume Rapide <br> $26.817</span>
                            </div>
                        </div>

                        <div class="col">
                            <div class="imagebox">
                                <a href="detalle_bicicleta.php"><img
                                        src="Bicicletas/bicicleta-olmo-reaktor-aluminio-r162.jpg"
                                        class="w-AUTO img-thumbnail" alt="bicicleta""></a>                                
                                <span class=" imagebox-desc">Olmo Reaktor Aluminio R20 <br> $13.123</span>
                            </div>
                        </div>

                        <div class="col">
                            <div class="imagebox">
                                <a href="detalle_bicicleta.php"> <img
                                        src="Bicicletas/bicicleta-olmo-safari-200-r202.jpg" class="w-AUTO img-thumbnail"
                                        alt="bicicleta"></a>
                                <span class="imagebox-desc">Olmo Safari 200 R20 <br> $15,367</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="imagebox">
                                <a href="detalle_bicicleta.php"> <img src="Bicicletas/bicicleta-sbk-fat-hunter-r24.jpg"
                                        class="w-AUTO img-thumbnail" alt="bicicleta"></a>
                                <span class="imagebox-desc">SBK Fat Hunter R24 <br> $22.919</span>
                            </div>
                        </div>
                    </div>

                    <br class="clear">

                    <div class="row">
                        <div class="col">
                            <div class="imagebox">
                                <a href="detalle_bicicleta.php"><img
                                        src="Bicicletas/bicicleta-scott-voltage-yz20-hidraulico.jpg"
                                        class="w-AUTO img-thumbnail" alt="bicicleta"></a>
                                <span class="imagebox-desc">Scott Voltage YZ 10 Hidraulico <br> $56.989</span>
                            </div>
                        </div>

                        <div class="col">
                            <div class="imagebox">
                                <a href="detalle_bicicleta.php"><img src="Bicicletas/bicicleta-teknial-pixel.jpg"
                                        class="w-AUTO img-thumbnail" alt="bicicleta"></a>
                                <span class="imagebox-desc">Teknial Pixel Freestyle 20 <br> $15.433</span>
                            </div>
                        </div>

                        <div class="col">
                            <div class="imagebox">
                                <a href="detalle_bicicleta.php"><img
                                        src="Bicicletas/bicicleta-trinx-dolphin-2-0-plegable9.jpg"
                                        class="w-AUTO img-thumbnail" alt="bicicleta"></a>
                                <span class="imagebox-desc">Trinx Dolphin 2.0 Plegable <br> $28.934</span>
                            </div>
                        </div>
                        <div class="col">
                            <div class="imagebox">
                                <a href="detalle_bicicleta.php"><img src="Bicicletas/scott-addict-rc-20.jpg"
                                        class="w-AUTO img-thumbnail" alt="bicicleta"></a>
                                <span class="imagebox-desc">Scott Addict RC 20 Carbono (2018) <br> $225.795</span>
                            </div>
                        </div>
                    </div>

                    <br class="clear">
        </main>

        <footer>
            <?=pie()?>
        </footer>
    </div>
</body>

</html>