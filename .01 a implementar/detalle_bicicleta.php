<!DOCTYPE html>
<html lang="es">
<?php
include("encabezado.php");
include("pie.php");

generar_tit($titulo);
//generar_menu($menu_ppal, 1);

?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Detalle Bicicletas</title>

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
            <?=encabezado()?>
            <!-- <?php echo crear_barra(); ?> -->

            <div id="encab">

                <?=$titulo?>
                <!-- <?=$menu_ppal?> -->
            </div>
        </header>

        <div class="Productos">
            <div class="row">
                <div class="col-xs-10 col-sm-6 col-md-4 product">
                    <div class="card">
                        <img src="Bicicletas/Teknial_Vintage.jpg" alt="Imagen  bicicleta Teknial Vintage">
                    </div>
                </div>
                <h3>Bicicleta Cannondale Trail 4 (2020)</h3>
                <p>Imprimir</p>
                </br></br>
                <p>Fabricante:Cannondale</p>
                <div>Contado:88.600</div>
            </div>
        </div>
        <div clas="Detalle_Bicicleta">
            <div>
                <h3>DESCRIPCION </h3>
                <h4>Caracteristicas</h4>
                <p>
                    <p>-Cuadro: SmartForm C2 Alloy, SAVE, Boost spacing, tapered 1-1/8" to 1.5" headtube, flat mount
                        brake, StraightShot internal cable routing, BSA-73</p>
                    <p>-Horquilla/Suspensión: RockShox XC30 TK 29"/27.5", 100mm, rebound, 1-1/8", Coil, 42mm offset
                        (27.5") 51mm offset (29")</p>
                    <p>- Llantas: WTB STX i23 TCS, 32h, tubeless ready</p>
                    <p>- Mazas/Bujes: (F) Shimano MT200 15x110 (R) MT200 Boost 141 QR</p>
                    <p>- Radios: Stainless Steel, 14g</p>
                    <p>- Cubiertas: WTB Ranger Comp, 27.5/29 x 2.25", DNA Compound</p>
                    <p>- Pedales: Cannondale Platform</p>
                    <p>- Bielas: FSA Alpha Drive, 30T</p>
                    <p>- Pedalier/Eje de motor: Sealed Cartridge</p>
                    <p>- Cadena: KMC X10, 10-speed</p>
                    <p>- Piñones: Sunrace, 11-42, 10-speed</p>
                    <p>- Cambio (TRAS): Shimano Deore GS</p>
                    <p>- Manetas de cambio/Shifters: Shimano Deore, 10-speed</p>
                    <p>- Manubrio: Cannondale 3 Riser, 6061 Alloy, 15mm rise, 8° sweep, 4° rise, 760mm</p>
                    <p>- Puños: Cannondale Dual-Density</p>
                    <p>- Potencia: 6061 Alloy, 31.8, 6°</p>
                    <p>- Dirección: Semi Integrated, 1-1/8" reducer</p>
                    <p>- Frenos: Shimano MT200 hydro disc, 180/160mm RT10 rotors</p>
                    <p>- Manetas de freno: Shimano MT200 hydro disc</p>
                    <p>- Sillín: Cannondale Stage 3</p>
                    <p>- Tija: Cannondale 3, 6061 Alloy, 31.6 x 350/400mm</p>






                </p>
            </div>
        </div>

        <main>
            <div class="div_ini">
                <h3> Sobre nosotros</h3>
                <p>
                    información del sitio
                </p>
            </div>
            <br class="clear">

            <div class="div_ini" style="float:left;width:45%;">
                <h3> Novedades <span class="badge badge-secondary">New</span> </h3>
                <p>
                    novedades - novedades -
                </p>
            </div>

            <div class="div_ini" style="float:right;width:45%;">
                <h3> Servicios</h3>
                <p>
                    servicios - servicios -
                </p>
            </div>
            <br class="clear">
        </main>
        <footer>
            <?=pie()?>
        </footer>

</body>

</html>