<!DOCTYPE html>
<html lang="es">
<?php

require_once 'inc/conn.php';
require_once('inc/session.php');
include("encabezado.php"); 
include("pie.php"); 

generar_tit($titulo);

if (!perfil_valido(1)) {
	header("location:index.php");}

	#pregunta si se hizo clic en el botón 'enviar', es decir si se enviaron los datos ingresados en el formulario al servidor
	$btn =(isset($_POST['enviar']) && !empty($_POST['enviar']))? true:false;
	
	function inicializar_vars() {
	//global $nombre, $marca, $fecha_compra, $precio, $precio_total, $unidades, $rodado, $modelo, $material, $tipo_bici, $descripcion, $imagen, $tipo, $stock;
	global $nro_compra, $fecha_compra, $precio, $precio_total, $unidades,$id_bicicleta,$nombre,$tipo,$id_cliente;
    //$nombre=$marca=$fecha_fabricacion=$precio=$edad=$gama=$rodado=$modelo=$material=$tipo_bici=$descripcion=$imagen=$tipo=$stock="";
        
    }

    function recuperar_datos() 
	{
		global $id_bicicleta,$nro_compra,$fecha_compra, $precio,$precio_total,$tipo,$unidades,$nombre,$id_cliente;
		
	    $id_cliente =(isset($_POST['id_cliente']) && !empty($_POST['id_cliente']))? $_POST['id_cliente']:"";
        $id_bicicleta =(isset($_POST['id_bicicleta']) && !empty($_POST['id_bicicleta']))? $_POST['id_bicicleta']:"";
        $tipo =(isset($_POST['tipo']) && !empty($_POST['tipo']))? $_POST['tipo']:"A"; 
		$nombre=(isset($_POST["nombre"]) && !empty($_POST["nombre"]))? $_POST["nombre"]:"";
        $nro_compra=(isset($_POST["nro_compra"]) && !empty($_POST["nro_compra"]))? $_POST["nro_compra"]:"";
		$fecha_compra=(isset($_POST["$fecha_compra"]) && !empty($_POST["$fecha_compra"]))? $_POST["$fecha_compra"]:"";     
        $precio=(isset($_POST["precio"]) && !empty($_POST["precio"]))? $_POST["precio"]:"";
		$precio_total=(isset($_POST["precio_total"]) && !empty($_POST["precio_total"]))? $_POST["precio_total"]:"";
		$unidades=(isset($_POST["unidades"]) && !empty($_POST["unidades"]))? $_POST["unidades"]:"";
    }
       function validar_datos()
		{ }       // validar nombre, apellido, mail ...
	 /*
		global $nombre, $id_bicicleta, $nro_compra, $fecha_compra, $precio_total, $unidades,$precio;
        $errores = 0;
        $msj = "";      
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {				
             if ($nombre == null || trim($nombre)=="")
             {
                $msj .= "Debe ingresar un nombre" . '\n';
                $errores++;
             }				
             if ($id_bicicleta == null || trim($id_bicicleta)=="")
             {
                $msj .= "Debe ingresar el nro de bicicleta" . '\n';
                $errores++;
             }
             if ($nro_compra == null || trim($nro_compra)=="")
             {
                $msj .= "Debe ingresar el numero de compra" . '\n';
                $errores++;
             }    
             if ($fecha_compra == null || trim($fecha_compra)=="")
             {
                $msj .= "Debe seleccionar una fecha de compra" . '\n';
                $errores++;
             }            
             if ($precio_total == null || trim($precio_total)=="")
             {
                $msj .= "Debe ingresar el precio total " . '\n';
                $errores++;
             }                        
             if ($unidades == null || trim($unidades)=="")
             {
                $msj .= "Debe ingresar la cantidad de unidades" . '\n';
                $errores++;
             }
             if ($precio == null || trim($precio)=="")
             {
                $msj .= "Debe ingresar el precio unitario" . '\n';
                $errores++;
             }
             if ($errores == 0)
                return true;
             else
                echo "<script language='javascript'>alert('$msj');window.location.href='abm_compra.php'</script>";
                exit;        		
        }		
    }
	*/
function lista_nombres(&$lista_nombres, &$nombre_bicicleta)
        {
            global $db, $nombre;
            $lista_nombres =  " <select id='id_bicicleta' name='id_bicicleta'>".
                                "	<option value=0 selected>&laquo;Seleccione una opcion&raquo;</option>";
            $sql  = " SELECT * 
                        FROM bicicletas 
                    ORDER BY id_bicicleta";
            $rs = $db->query($sql);                    
        
            $nombre_bicicleta = "";
            foreach ($rs as $row) {
                $seleccionado = "";
                if ($nombre == $row['id_bicicleta']) {
                    $nombre_bicicleta = $row['nombre_bicicleta'];
                    $seleccionado = "selected";
                }
                    $lista_nombres .= "<option value='{$row['id_bicicleta']}' $seleccionado>". utf8_encode($row['nombre_bicicleta'])."</option>";
                }           
            
            $lista_nombres .= "</select>";
            $rs=null;
        }
		function lista_precios(&$lista_precios, &$precio)
        {
            global $db, $precio;
            $lista_precios =  " <select id='precio' name='precio'>".
                                "	<option value=0 selected>&laquo;Seleccione una opcion&raquo;</option>";
            $sql  = " SELECT precio 
                        FROM bicicletas 
						WHERE  id_bicicleta=$id_bicicleta
                    ORDER BY id_bicicleta";
            $rs = $db->query($sql);                    
        
            $precio_bicicleta = "";
            foreach ($rs as $row) {
                $seleccionado = "";
                if ($precio == $row['id_bicicleta']) {
                    $precio_bicicleta = $row['precio_bicicleta'];
                    $seleccionado = "selected";
                }
                    $lista_precios .= "<option value='{$row['id_bicicleta']}' $seleccionado>". utf8_encode($row['lista_precios'])."</option>";
                }           
            
            $lista_precios .= "</select>";
            $rs=null;
        }
		
lista_nombres($lista_nombres, $nombre_bicicleta);
lista_precios($lista_precios, $precio);
		
    inicializar_vars();
     if (!$btn) { 
        # no hizo clic en el botón 'enviar'(de tipo submit), la solicitud viene de la página personas.php (por medio de un enlace - utilizando metodo GET)
        # puede ser un alta o modificacion  
        # recuperar el id de la persona y tipo de operación por medio del método GET
        # el id y tipo deben ser cargados en los inputs ocultos del formulario para saber que operación fue la que se solicitó
        #seleccionar los datos según el identificador de la persona ingresado
    $id_compra =(isset($_GET['id_compra']) && !empty($_GET['id_compra']))? $_GET['id_compra']:"";
    $tipo =(isset($_GET['tipo']) && !empty($_GET['tipo']))? $_GET['tipo']:"A"; 

    #Valida datos ingresados - 	 $pers_id-$tipo 
    #validar_datos();

    #si es un alta inicaliza los datos en vacio, sino busca los datos de la persona	
    if ($tipo=="A") {
        inicializar_vars();
    } else {
         $sql ="SELECT clientes.id_cliente,compran.fecha_compra
                FROM compran           
                INNER JOIN clientes ON clientes.id_cliente=compran.id_cliente
                WHERE id_cliente=$id_Cliente
			   
            ";
        $rs = $db->query($sql)->fetch();
        
        if ($rs){
           
		    $id_cliente=$rs['id_cliente'];
            $fecha_compra=$rs['fecha_compra']; 
         // $precio=$rs['precio'];
		//	$precio_total=$rs['precio_total'];
        // 	$nro_compra=$rs[' $nro_compra'];
		//	$unidades=$rs['$unidades'];
		//	$id_bicicleta=$re['id_bicicleta'];
         // $nombre=$rs['nombre'];  
        } else {
            print_r($db->errorInfo());  #desarrollo
        }
        $rs=null;
    }

} else {
#hizo clic en el boton submit - envio los datos del formulario a procesar en el servidor

# grabamos los datos enviados por el método POST en el formulario en la BD
# recuperar todos los datos (incluso los campos ocultos) por el método POST

recuperar_datos();

validar_datos();  #SIEMPRE VALIDAR DATOS 

#ver si es una modificación o un alta
if ($tipo=="M") {
    $sql1="UPDATE compran SET 
           id_compra=?, fecha_compra=?,id_cliente=?   
          WHERE id_compra=$id_compra
        ";
	$sql2="UPDATE detalle_compra SET 
           unidades=?, precio_total=?,id_compra=?,id_bicicleta=?   
          WHERE id_bicicleta=$id_bicicleta
        ";
    $sql1 = $db->prepare($sql1);
    $sqlvalue1=[$id_compra,$fecha_compra,$id_cliente];
    $rs1 = $sql1->execute($sqlvalue1);

	$sql2 = $db->prepare($sq2);
    $sqlvalue2=[$id_compra,$fecha_compra,$id_cliente];
    $rs2 = $sql2->execute($sqlvalue2);
	

    if (!$rs1) {
        print_r($db->errorInfo());  #desarrollo
    } else {
        header("location:bicicletas.php");
    }
    $rs1=null;
	if (!$rs2) {
        print_r($db->errorInfo());  #desarrollo
    } else {
        header("location:bicicletas.php");
    }
    $rs2=null;
} else {   #es un alta 
      
    $sql1 = "INSERT INTO compran(id_compra,fecha_compra,id_cliente) VALUES(?,?)"; 
    $sql1 = $db->prepare($sql1);
    $sqlvalue1=[$id_compra,$fecha_compra,$total,$id_cliente];
    $rs1 = $sql1->execute($sqlvalue1);
	
	$compran = "SELECT @@IDENTITY";
    $compran = $db->query($compran)->fetch();
    $compran = implode($compran);
	
	$sql2 = "INSERT INTO detalle_compra(unidades,precio_total,id_compra,id_bicicleta) VALUES(?,?)"; 
    $sql2 = $db->prepare($sql2);
    $sqlvalue2=[$id_compra,$fecha_compra,$total,$id_cliente];
    $rs2 = $sql2->execute($sqlvalue2);

    $detalle_compra = "SELECT @@IDENTITY";
    $detalle_compra = $db->query($detalle_compra)->fetch();
    $detalle_compra = implode($detalle_compra);
    
    if ((!$rs1) ||(!$rs2)) {
        print_r($db->errorInfo());  #desarrollo
    } else {
        header("location:compra.php");
        # Una vez hecho el alta o modificación volver a la página personas.php
    }
    $rs1=null;
	 $rs2=null;
    }
}
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>ABM Compras </title>

    <!-- <meta name="description" content="breve descripcion del sitio">
    <meta name="keywords" content="palabraclave1,palabraclave2,palabraclave3">
    <meta name="robots" content="index,nofollow"> -->

    <link rel="shortcut icon" href="images/Logo-Speed-Bikes.png" type="image/x-icon">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/all.min.css">
    <script type="text/javascript"></script>
    <!-- jQuery first, then Popper.js (incluido en .blunde.min.js), then Bootstrap JS 
    -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <script>
    function Borrar_Datos {
        document.getElementbyId("datos").reset();
    }
    </script>
    <script>
    function Validar_JS() {
        var nro_compra, fecha_compra, unidades, exp1, exp2;

        nro_compra = document.getElementbyId("nro_compra").value;
        unidades = document.getElementbyId("unidades").value;
        fecha_compra = document.getElementbyId("fecha_compra").value;
        // exp1=/^([0-9])*$/;

    }
    </script>


</head>
<header>
    <?php echo crear_barra(0); ?>
    <div id="encab">
        <?=$titulo?>
    </div>
</header>

<body>
    <main id="cuerpo">
        <h1>Formulario para Alta de Bicicletas</h1></br>

        <form id="datos" action="abm_compra.php" method="post" onsubmit="return validar()">
            <fieldset>
                <legend>Detalles</legend>

                <label for="Numero de Compra">Numero de Compra</label>
                <input type="number" name="Numero_Compra" id="Numero_Compra" value="" maxlength="35"
                    title="Ingrese el numero de compra" required>

                <label for="fecha_compra">Fecha de Compra</label>
                <input type="date" name="fecha_compra" id="fecha_compra" value="" maxlength="35"
                    title="Ingrese fecha de compra" required>

                <label for="precio">Precio total</label>
                <input type="number" name="precio" id="precio" value="" maxlength="35" title="Ingrese precio" required>
                <!--readonly-->

                <label for="Unidades">Unidades</label>
                <input type="number" name="Unidades" id="Unidades" value="" maxlength="35" title="Ingrese las unidades"
                    required>

                <fieldset>

                    <legend>Detalle Bicicletas</legend>

                    <label for="id_bicicleta">Nro detalle de Bicicleta</label>
                    <?=$lista_nombres?>

                    <!--	<label for="nombre_bicicleta">Nombre Bicicleta</label>
					<input type="text" name="nombre_bicicleta" id="nombre_bicicleta" value="" maxlength="35"
                    title="Ingrese el nombre de la bicicleta" required  >	 -->


                    <label for="precio">Precio Unitario</label>
                    <?=$lista_precios?>
                </fieldset>

                <fieldset id="btn" style="text-align:right;">
                    <legend>&nbsp;</legend>
                    <input type="submit" name="enviar" value="Enviar Datos">
                    <input type="reset" name="cancelar" value="Cancelar">
                </fieldset>

                <input type="hidden" name="tipo" id="tipo" value="<?=$tipo?>">
                <input type="hidden" name="id_compra" id="id_compra" value="<?=$id_compra?>">
            </fieldset>

        </form>
    </main>
    <footer>
        <?=pie()?>
    </footer>
</body>

</html>