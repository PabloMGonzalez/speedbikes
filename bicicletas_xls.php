<!DOCTYPE html>
<html lang="es">
<?php

# con esto evitamos que el navegador lo grabe en su caché
header("Pragma: no-cache");
header("Expires: 0");

# indica al navegador que muestre el diálogo de descarga aún sin haber descargado todo el contenido
header("Content-type: application/octet-stream");
# indica al navegador que se está devolviendo un archivo
header("Content-Disposition: attachment; filename=listado.xls");
header("Content-type: application/vnd.ms-excel");

require 'inc/session.php';
require 'inc/conn.php';  #crea la conexión a la BD

    $marca = (isset($_POST["marca"]) && !empty($_POST["marca"]))? $_POST["marca"]:0;   
    $orden = (isset($_POST["orden"]) && !empty($_POST["orden"]))? $_POST["orden"]:0;
    $fecha_fabricacion = (isset($_POST["fecha_fabricacion"]) && !empty($_POST["fecha_fabricacion"]))? trim($_POST["fecha_fabricacion"]):null; 


    $filtro="";
    $orden_sql="";
    $col="7";

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
 
     


?>

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">

    <title>Consultas Spedbikes</title>

</head>

<body>
    <table>
        <caption><strong><?=$titfilt?><strong> </caption>
        <tr>
            <th>Marca</th>
            <th>Rodado</th>
            <th>Nombre Bicicleta</th>
            <th>Precio</th>
            <th>Fecha Fabricacion</th>
            <th>Detalle</th>
        </tr>


        <?php
    $marca = 0;
 

    if ($rs) {
        foreach ($rs as $reg) {                
                
                 ?>

        <tr class="constxt1">
            <td align="center"> <?php echo utf8_encode($reg['nombre_marca']); ?></td>
            <td align="center"><?=$reg['id_rodado']?></td>
            <td align="center"><?=$reg['nombre_bicicleta']?></td>
            <td align="center">$<?=utf8_encode($reg['precio'])?></td>
            <td align="center"><?=date("d-m-Y",strtotime($reg['fecha_fabricacion']))?></td>
            <td><?=$reg['descripcion']?></td>
        </tr>
        <?php
            
        }        
        
    }
?>
    </table>

    <?php	
	$rs=null;
    $db=null;
?>
</body>

</html>