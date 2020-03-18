<!DOCTYPE html>
<html lang="es">

<?php
require_once("inc/conn.php");
require_once('inc/session.php');
include("encabezado.php");
include("pie.php");

generar_tit($titulo);
     
    $marca = (isset($_POST["marca"]) && !empty($_POST["marca"]))? $_POST["marca"]:0;   
    $orden = (isset($_POST["orden"]) && !empty($_POST["orden"]))? $_POST["orden"]:0;
    $fecha_fabricacion = (isset($_POST["fecha_fabricacion"]) && !empty($_POST["fecha_fabricacion"]))? trim($_POST["fecha_fabricacion"]):null; 

    # busca los cargos disponibles y se presentan en una lista
    function lista_marcas(&$lista_m, &$nombre_marca)
    {
        global $db, $marca;
        $lista_m =  " <select id='marca' name='marca' style='width:17%;' >".
                            "	<option value=0 selected>&laquo;Todos&raquo;</option>";
        $sql  = " SELECT * 
                    FROM marcas 
                ORDER BY nombre_marca";
        $rs = $db->query($sql);
                    
        if (!$rs) {
            echo("no hubo resultados");
        } else {
            $nombre_marca = "";
            foreach ($rs as $row) {
                $seleccionado = "";
                if ($marca == $row['id_marca']) {
                    $nombre_marca = $row['nombre_marca'];
                    $seleccionado = "selected";
                }
                $lista_m .= "<option value='{$row['id_marca']}' $seleccionado>". utf8_encode($row['nombre_marca'])."</option>";
            }
        }
        $lista_m .= "</select>";
        $rs=null;
    }

    # filtro por una fecha ($fecha_fabricacion)  
	if (!is_null($fecha_fabricacion) && (trim($fecha_fabricacion)<>""))  // sale Y/m/d 	
	{ //arma la fecha con sus separadores
		$fecha_fabricacion = str_replace(array('\'', '-', '.', ','), '/', $fecha_fabricacion); 
		$fecha_fabricacion = str_replace(' ','', $fecha_fabricacion); 
		
		$patron="/^[0-2][0-9]\/[01][0-9]\/[0-9]{4}/";
	
		if (preg_match($patron,$fecha_fabricacion)==1) {
			//crea un array con el delimitador ("/")
			$f = explode('/', $fecha_fabricacion);
			//comprueba que la fecha sea de tipo mes dia fecha_fabricacion 
			if (checkdate($f[1],$f[0],$f[2])) {   #checkdate(m,d,y)
				$fecha_fabricacion = "$f[2]/$f[1]/$f[0]";  #Y-m-d
			} else {
				$fecha_fabricacion=null;
			}
		} else {
			$fecha_fabricacion=null;
		}
	
	}

    $filtro="";
    $orden_sql="";
    $col="7";
    
    lista_marcas($lista_m, $nombre_marca);  #lista de cargos

    #armar filtro para la consulta
    $titfilt = "Listado de Marcas ";
    $titfiltro = "";
    $filtro="";
    
    if ($marca <> 0) {
        $titfiltro .= " - Marca: $nombre_marca ";
        $filtro .= " marcas.id_marca=$marca " ;
    }

    //agrego filtro para la fecha...
	if ($fecha_fabricacion <> "") {
		$titfiltro .= " - fecha_fabricacion: ".date("d/m/Y",strtotime($fecha_fabricacion));
		
		if ($filtro!=="")  $filtro .= " 	AND " ;
		$filtro .= " 	Fecha_fabricacion  >='$fecha_fabricacion' ";
	}
    
    if ($orden==1) {
        $orden_sql .= "marcas.nombre_marca, id_rodado";
    }
        
    if ($orden==2) {
        $orden_sql .= "marcas.nombre_marca, precio ";
    }
    
    if (trim($filtro)=="") {
        $filtro = " 0=0 ";
    }
    if ($orden_sql=="") {
        $orden_sql = "marcas.nombre_marca, id_bicicleta ";
    }

    $sql = "SELECT bicicletas.*, marcas.*, detalle. *
			FROM bicicletas
			INNER JOIN marcas ON marcas.id_marca=bicicletas.id_marca
            INNER JOIN detalle ON detalle.id_detalle=bicicletas.id_detalle
            INNER JOIN rodados ON rodados.medida=bicicletas.id_rodado	
			WHERE $filtro
			ORDER BY $orden_sql ";
    $rs = $db->query($sql);

    if (!$rs) {        #print_r($db->errorInfo()); # mensaje en desarrollo
            print_r($db->errorInfo());
        echo "<tr><td colspan='<?=$col?>'><br>&nbsp;&nbsp; - No se encuentran datos para el filtro ingresado.</td>
</tr>";
exit;
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Consultas Spedbikes</title>

    <link rel="shortcut icon" href="images/Logo-Speed-Bikes.png" type="image/x-icon" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/all.min.css">


    <!-- jQuery first, then Popper.js (incluido en .blunde.min.js), then Bootstrap JS -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <script type="text/javascript">
    function listado() {
        var errores = 0;

        // valida datos ingresados en el formulario
        // si datos ok -- return true  sino return false
        if (errores == 0) {
            document.getElementById("datos").method = "post";
            document.getElementById("datos").action = "consulta_bicicletas.php";
            document.getElementById("datos").submit();

            return true;
        } else {
            return false;
        }
    }

    function excel() {
        // validar datos .....

        document.getElementById("datos").method = "post";
        document.getElementById("datos").action = "bicicletas_xls.php";
        document.getElementById("datos").submit();
    }
    </script>

</head>

<body>
    <header>
        <?php echo crear_barra(0);?>
        <div id="encab">
            <?=$titulo?>
        </div>

        <div id="encabprint">
            Speedbikes
            <br>
            <span style="font-size:0.7em;"> Fecha de Impresión <?=date("d/m/Y H:i")?>hs. </span>
        </div>
    </header>

    <main id="cuerpo">

        <div style="text-align:right;" id="cons_print">
            <a href="javascript:window.print();" title="Imprimir listado.">
                <img src='images/print.png' title="Imprimir listado." alt="icono imprimir."
                    style="border:0;width:32px;height:32px;"></a>
            &nbsp;&nbsp;
            <a href="javascript:excel()" title='Excel del listado.'>
                <img src='images/excel.png' title='Excel del listado.' alt="icono Excel."
                    style="border:0;width:28px;height:28px;">
            </a>
        </div>

        <div class="cons_opcion">
            <form name="datos" id="datos" method="post" action="consulta_bicicletas.php" onsubmit="return listado();">
                <fieldset>
                    <legend>Opciones</legend>
                    <?=$lista_m?>


                    <label for="fecha_fabricacion">Desde </label>
                    <input type="text" id="fecha_fabricacion" name="fecha_fabricacion"
                        value="<?php if (!is_null($fecha_fabricacion)){?><?=trim(date("d/m/Y",strtotime($fecha_fabricacion)))?><?php }?>"
                        size="7" maxlength="10" title="Fecha_fabricacion Bicicleta - formato: dd/mm/aaaa">
                    <span style="font-size:0.8em;color:#666;font-weight:normal; padding-left:0;">(dd/mm/aaaa)</span>


                    &nbsp;

                    <!-- <label for="precio">Desde </label>
                    <input type="text" id="precio" name="precio" value="<?php  ($precio)?>" size="6" maxlength="10"
                        title="Precio - Desde "> -->

                    <span style="font-size:0.8em;color:#666;font-weight:normal; padding-left:0;">($)</span>

                    <span>Orden</span>
                    <input type="radio" name="orden" id="orden1" value="1" <?php if ($orden==1) {?> checked="checked"
                        <?php }?>>
                    <label for="orden1">Rodado</label>
                    <input type="radio" name="orden" id="orden2" value="2" <?php if ($orden==2) {?> checked="checked"
                        <?php }?>>
                    <label for="orden2">Precio</label>

                    <input type="submit" id="Mostrar" name="Mostrar" value="Mostrar Listado">
                </fieldset>
            </form>

        </div>

        <br class="clear">

        <h2 class="constit"><?=$titfilt?></h2>
        <p class="constit1"><?=$titfiltro?></p>

        <table width="85%" class="cons_tabla">
            <tr>
                <th>Marca</th>
                <th>Rodado</th>
                <th>Nombre Bicicleta</th>
                <th>Precio</th>
                <th>Detalle</th>
                <th>Fecha Fabricacion</th>
                <th>Foto</th>
            </tr>

            <?php
    $marca = 0;
    $tot=$total=0;
    $subtotal="";

    if ($rs) {
        foreach ($rs as $reg) {
            if ($marca <> $reg['id_marca']) {
                $subtotal="";
                
                if ($tot<>0) {
                    $subtotal="<td colspan=$col class='cons_txt1'> total: $tot</td> ";
                } ?>
            <tr><?=$subtotal?></tr>
            <tr>
                <td colspan=<?=$col?> class="cons_txt"> <?php echo utf8_encode($reg['nombre_marca']); ?></td>
            </tr>


            <?php
                $marca = $reg['id_marca'];
                $tot=0;
            }
            
            # $apellido = utf8_encode($reg['apellido']);
            $nombre = utf8_encode($reg['precio']); ?>
            <tr class="constxt1">
                <td align="center">&nbsp;</td>
                <td align="center"><?=$reg['id_rodado']?></td>
                <td align="center"><?=$reg['nombre_bicicleta']?></td>
                <td align="center">$<?=$nombre?></td>
                <td align="left"><?=$reg['descripcion']?></td>
                <td align="center"><?=date("d-m-Y",strtotime($reg['fecha_fabricacion']))?></td>
                <td align="center"><img src="<?=$reg['imagen']?>" style="width:150px;" alt="bicicleta"> </td>

            </tr>
            <?php
            $tot++;
            $total++;
        }
        
        if ($tot<>0) {
            $subtotal="<tr><td colspan=$col class='cons_txt1'> total: $tot</td></tr> ";
        }
        
        if ($total<>0) {
            $subtotal.="<tr><td colspan=$col class='cons_txt1'> Total Marcas: $total</td></tr> ";
        } else {
            $subtotal.="<tr><td colspan=$col> No se encuentran datos para el filtro ingresado</td></tr> ";
        }
        
        echo $subtotal;
    }
?>
        </table>

    </main>


    <footer>
        <?=pie()?>
    </footer>

</body>

</html>