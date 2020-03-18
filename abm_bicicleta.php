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
	global $nombre, $marca, $fecha_fabricacion, $precio, $edad, $gama, $rodado, $modelo, $material, $tipo_bici, $descripcion, $imagen, $tipo, $stock;
		
    $nombre=$marca=$fecha_fabricacion=$precio=$edad=$gama=$rodado=$modelo=$material=$tipo_bici=$descripcion=$imagen=$tipo=$stock="";
        
    }

    function recuperar_datos() {
		global $id_bicicleta, $nombre, $marca, $fecha_fabricacion, $precio, $edad, $gama, $rodado, $modelo, $material, $tipo_bici, $descripcion, $imagen, $stock;
		
        $id_bicicleta =(isset($_POST['id_bicicleta']) && !empty($_POST['id_bicicleta']))? $_POST['id_bicicleta']:"";
        $tipo =(isset($_POST['tipo']) && !empty($_POST['tipo']))? $_POST['tipo']:"A"; 

        $nombre=(isset($_POST["nombre"]) && !empty($_POST["nombre"]))? $_POST["nombre"]:"";
		$marca =(isset($_POST["marca"]) && !empty($_POST["marca"]))? $_POST["marca"]:"";	
		$fecha_fabricacion=(isset($_POST["fecha_fabricacion"]) && !empty($_POST["fecha_fabricacion"]))? $_POST["fecha_fabricacion"]:"";     
        $precio=(isset($_POST["precio"]) && !empty($_POST["precio"]))? $_POST["precio"]:"";
		$edad=(isset($_POST["edad"]) && !empty($_POST["edad"]))? $_POST["edad"]:"";
		$gama=(isset($_POST["gama"]) && !empty($_POST["gama"]))? $_POST["gama"]:"";
		$rodado=(isset($_POST["rodado"]) && !empty($_POST["rodado"]))? $_POST["rodado"]:"";
        $modelo=(isset($_POST["modelo"]) && !empty($_POST["modelo"]))? $_POST["modelo"]:"";
        $material=(isset($_POST["material"]) && !empty($_POST["material"]))? $_POST["material"]:"";
        $tipo_bici=(isset($_POST["tipo_bici"]) && !empty($_POST["tipo_bici"]))? $_POST["tipo_bici"]:"";
        $descripcion=(isset($_POST["descripcion"]) && !empty($_POST["descripcion"]))? $_POST["descripcion"]:"";
        $imagen=(isset($_POST["imagen"]) && !empty($_POST["imagen"]))? $_POST["imagen"]:"";
        $stock=(isset($_POST["stock"]) && !empty($_POST["stock"]))? $_POST["stock"]:"";
    }

            function lista_marcas(&$lista_m, &$nombre_marca)
            {
                global $db, $marca;
                $lista_m =  " <select id='marca' name='marca'>".
                                    "	<option value=0 selected>&laquo;Seleccione una opcion&raquo;</option>";
                $sql  = " SELECT * 
                            FROM marcas 
                        ORDER BY nombre_marca";
                $rs = $db->query($sql);                    
            
                $nombre_marca = "";
                foreach ($rs as $row) {
                    $seleccionado = "";
                    if ($marca == $row['id_marca']) {
                        $nombre_marca = $row['nombre_marca'];
                        $seleccionado = "selected";
                    }
                        $lista_m .= "<option value='{$row['id_marca']}' $seleccionado>". utf8_encode($row['nombre_marca'])."</option>";
                    }           
                
                $lista_m .= "</select>";
                $rs=null;
            }

    function lista_rodados(&$lista_r, &$medida)
    {
        global $db, $rodado;
        $lista_r =  " <select id='rodado' name='rodado'>".
                            "	<option value=0 selected>&laquo;Seleccione una opción&raquo;</option>";
        $sql  = " SELECT * 
                    FROM rodados 
                ORDER BY medida";
        $rs = $db->query($sql);                    
      
        $medida = "";
        foreach ($rs as $row) {
            $seleccionado = "";
            if ($rodado == $row['medida']) {
                $medida = $row['medida'];
                $seleccionado = "selected";
             }
                $lista_r .= "<option value='{$row['medida']}' $seleccionado>". utf8_encode($row['medida'])."</option>";
            }
        
        $lista_r .= "</select>";
        $rs=null;
    }

    function lista_estilos(&$lista_e, &$tipo_bici)
    {
        global $db, $estilo;
        $lista_e =  " <select id='tipo_bici' name='tipo_bici'>".
                            "	<option value=0 selected>&laquo;Seleccione una opción&raquo;</option>";
        $sql  = " SELECT * 
                    FROM estilos
                ORDER BY id_estilo";
        $rs = $db->query($sql);                    
      
        $estilo="";
        foreach ($rs as $row) {
            $seleccionado = "";
            if ($estilo == $row['id_estilo']) {
                $tipo_bici = $row['tipo'];
                $seleccionado = "selected";
             }
                $lista_e .= "<option value='{$row['id_estilo']}' $seleccionado>". utf8_encode($row['tipo'])."</option>";
            }
        
        $lista_e .= "</select>";
        $rs=null;
    }
    
    lista_rodados($lista_r, $medida);
    lista_estilos($lista_e, $tipo_bici);
    lista_marcas($lista_m, $nombre_marca);

    function validar_datos() {
        global $nombre, $marca, $stock, $fecha_fabricacion, $precio, $edad, $gama, $rodado, $modelo, $material, $tipo_bici, $descripcion;

        $errores = 0;
        $msj = "";      
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {				
             if ($nombre == null || trim($nombre)=="")
             {
                $msj .= "Debe ingresar un nombre" . '\n';
                $errores++;
             }				
             if ($marca == null || trim($marca)=="")
             {
                $msj .= "Debe elegir una marca" . '\n';
                $errores++;
             }
             if ($stock == null || trim($stock)=="")
             {
                $msj .= "Debe ingresar la cantidad de bicicletas" . '\n';
                $errores++;
             }    
             if ($fecha_fabricacion == null || trim($fecha_fabricacion)=="")
             {
                $msj .= "Debe seleccionar una fecha de fabricacion" . '\n';
                $errores++;
             }            
             if ($precio == null || trim($precio)=="")
             {
                $msj .= "Debe ingresar el precio" . '\n';
                $errores++;
             }                        
             if ($edad == null || trim($edad)=="")
             {
                $msj .= "Debe elegir entre Niño y Adulto" . '\n';
                $errores++;
             }
             if ($gama == null || trim($gama)=="")
             {
                $msj .= "Debe elegir la gama" . '\n';
                $errores++;
             }
             if ($rodado == null || trim($rodado)=="")
             {
                $msj .= "Debe elegir el rodado" . '\n';
                $errores++;
             }
             if ($modelo == null || trim($modelo)=="")
             {
                $msj .= "Debe ingresar el modelo" . '\n';
                $errores++;
             }	
             if ($material == null || trim($material)=="")
             {
                $msj .= "Debe ingresar el material" . '\n';
                $errores++;
             }
             if ($tipo_bici == null || trim($tipo_bici)=="")
             {
                $msj .= "Debe elegir el estilo" . '\n';
                $errores++;
             }	             	             

             if ($errores == 0)
                return true;
             else
                echo "<script language='javascript'>alert('$msj');window.location.href='abm_bicicleta.php'</script>";
                exit;        		
        }		
    }	

    inicializar_vars();    
    
    if (!$btn) { 
        # no hizo clic en el botón 'enviar'(de tipo submit), la solicitud viene de la página personas.php (por medio de un enlace - utilizando metodo GET)
        # puede ser un alta o modificacion  
        # recuperar el id de la persona y tipo de operación por medio del método GET
        # el id y tipo deben ser cargados en los inputs ocultos del formulario para saber que operación fue la que se solicitó
        #seleccionar los datos según el identificador de la persona ingresado
    $id_bicicleta =(isset($_GET['id_bicicleta']) && !empty($_GET['id_bicicleta']))? $_GET['id_bicicleta']:"";
    $tipo =(isset($_GET['tipo']) && !empty($_GET['tipo']))? $_GET['tipo']:"A"; 

    #Valida datos ingresados - 	 $pers_id-$tipo 
    #validar_datos();

    #si es un alta inicaliza los datos en vacio, sino busca los datos de la persona	
    if ($tipo=="A") {
        inicializar_vars();
    } else {
         $sql = "SELECT bicicletas.*,marcas.*, rodados.*,cuadros.*,estilos.*,detalle.*
                FROM bicicletas           
                INNER JOIN marcas ON marcas.id_marca=bicicletas.id_marca
                INNER JOIN detalle ON detalle.id_detalle=bicicletas.id_detalle
                INNER JOIN rodados ON rodados.medida=bicicletas.id_rodado
                INNER JOIN estilos ON estilos.id_estilo=bicicletas.id_estilo
                INNER JOIN cuadros ON cuadros.id_cuadro=bicicletas.id_cuadro	
                WHERE id_bicicleta=$id_bicicleta
            ";
        $rs = $db->query($sql)->fetch();
        
        if ($rs){
            $nombre=$rs['nombre_bicicleta'];
            $marca=$rs['nombre_marca']; 
            $fecha_fabricacion=$rs['fecha_fabricacion']; 
            $precio=$rs['precio']; 
            $edad=$rs['edad']; 
            $gama=$rs['gama']; 
            $rodado=$rs['medida']; 
            $modelo=$rs['modelo']; 
            $material=$rs['material']; 
            $tipo_bici=$rs['tipo']; 
            $descripcion=$rs['descripcion']; 
            $imagen=$rs['imagen'];
            $stock=$rs['stock'];			
           
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


# chequear que no se ingrese un documento que ya exista
###############################
    
#ver si es una modificación o un alta
if ($tipo=="M") {
    $sql="UPDATE bicicletas SET 
           nombre_bicicleta=?, fecha_fabricacion=?, precio=?, stock=?, gama=?, edad=?, id_cuadro=?, id_estilo=?, id_detalle=?, id_marca=?, id_rodado=?   
          WHERE id_bicicleta=$id_bicicleta
        ";
    $sql = $db->prepare($sql);
    $sqlvalue=[$nombre,$fecha_fabricacion,$precio,$stock,$gama,$edad,$modelo,$tipo_bici,$descripcion,$marca,$rodado];
    $rs = $sql->execute($sqlvalue);


    if (!$rs) {
        print_r($db->errorInfo());  #desarrollo
    } else {
        header("location:bicicletas.php");
    }
    $rs=null;

} else {   #es un alta 
      
    $sql = "INSERT INTO cuadros(modelo,material) VALUES(?,?)"; 
    $sql = $db->prepare($sql);
    $sqlvalue=[$modelo,$material];
    $rs = $sql->execute($sqlvalue);

    $modelo = "SELECT @@IDENTITY";
    $modelo = $db->query($modelo)->fetch();
    $modelo = implode($modelo);

    $sql = "INSERT INTO detalle(imagen,descripcion) VALUES(?,?)"; 
    $sql = $db->prepare($sql);
    $sqlvalue=[$imagen,$descripcion];
    $rs = $sql->execute($sqlvalue);

    $descripcion = "SELECT @@IDENTITY";
    $descripcion = $db->query($descripcion)->fetch();
    $descripcion = implode($descripcion);

    $sql = "INSERT INTO bicicletas(nombre_bicicleta,fecha_fabricacion,precio,gama,edad,stock,id_cuadro,id_estilo,id_detalle,id_marca,id_rodado) 
             VALUES(?,?,?,?,?,?,?,?,?,?,?)"; 
    $sql = $db->prepare($sql);
    $sqlvalue=[$nombre,$fecha_fabricacion,$precio,$gama,$edad,$stock,$modelo,$tipo_bici,$descripcion,$marca,$rodado];
    $rs = $sql->execute($sqlvalue);
    
    if (!$rs) {
        print_r($db->errorInfo());  #desarrollo
    } else {
        header("location:bicicletas.php");
        # Una vez hecho el alta o modificación volver a la página personas.php
    }
    $rs=null;
    }
}
        
    
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>ABM Bicicletas </title>

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
    function Borrar_Datos() {
        document.getElementbyId("datos").reset();
    }

    function validar() {
        var errores = 0,
            msj = "";

        nomb1 = document.getElementById("marca").selectedIndex;
        if (nomb1 == 0 || nomb1 == null) {
            msj += "Debe elegir una marca" + "\n";
            errores++;
        }
        nomb1 = document.getElementById("edad").selectedIndex;
        if (nomb1 == 0 || nomb1 == null) {
            msj += "Debe elegir entre Niño y Adulto" + "\n";
            errores++;
        }
        nomb1 = document.getElementById("gama").selectedIndex;
        if (nomb1 == 0 || nomb1 == null) {
            msj += "Debe elegir la gama" + "\n";
            errores++;
        }
        nomb1 = document.getElementById("rodado").selectedIndex;
        if (nomb1 == 0 || nomb1 == null) {
            msj += "Debe elegir el rodado" + "\n";
            errores++;
        }
        nomb1 = document.getElementById("tipo_bici").selectedIndex;
        if (nomb1 == 0 || nomb1 == null) {
            msj += "Debe elegir el estilo de la bicicleta" + "\n";
            errores++;
        }
        if (errores == 0)
            return true;
        else
            alert(msj);
        return false;
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

        <form id="datos" action="abm_bicicleta.php" method="post" onsubmit="return validar()">
            <fieldset>
                <legend>Detalles</legend>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?=$nombre?>" maxlength="35"
                    title="Ingrese el nombre" required>

                <label for="marca">Marca</label>
                <?=$lista_m?>

                <label for="stock">Cantidad</label>
                <input type="number" name="stock" id="stock" value="<?=$stock?>" maxlength="35"
                    title="Ingrese la cantidad" required>

                <label for="fecha_fabricacion">Fecha de fabricacion</label>
                <input type="date" name="fecha_fabricacion" id="fecha_fabricacion" value="<?=$fecha_fabricacion?>"
                    maxlength="35" title="Ingrese fecha de fabricacion" required>

                <label for="precio">Precio</label>
                <input type="text" name="precio" id="precio" value="<?=$precio?>" maxlength="35" title="Ingrese precio"
                    required>

                <label for="edad">Edad</label>
                <select id="edad" name="edad" required>
                    <option value="-1" selected="selected">&laquo;Seleccione una opción&raquo;</option>
                    <option value="Ninio">Niño</option>
                    <option value="Adulto">Adulto</option>
                </select>

                <label for="gama">Gama</label>
                <select id="gama" name="gama" required>
                    <option value="-1" selected="selected">&laquo;Seleccione una opcion&raquo;</option>
                    <option value="Baja">Baja</option>
                    <option value="Media">Media</option>
                    <option value="Alta">Alta</option>
                </select>

                <label for="rodado">Rodado</label>
                <?=$lista_r?>

                <fieldset>
                    <legend>Cuadro</legend>
                    <label for="modelo">Modelo</label>
                    <input type="text" name="modelo" id="modelo" value="<?=$modelo?>" maxlength="35"
                        title="Ingrese el modelo del cuadro" required>

                    <label for="material">Material</label>
                    <input type="text" name="material" id="material" value="<?=$material?>" maxlength="35"
                        title="Ingrese el material" required>
                </fieldset>

                <fieldset>
                    <legend>Tipo de Bicicleta </legend>
                    <br>
                    <?=$lista_e?>
                </fieldset>

                <fieldset>
                    <legend>Descripcion </legend>
                    <textarea name="descripcion" id="descripcion" cols="70" rows="10"
                        required><?=$descripcion?></textarea>

                    <label for="imagen">Imagen</label>
                    <input type="text" name="imagen" id="imagen" value="<?=$imagen?>" required>
                </fieldset>

                <fieldset id="btn" style="text-align:right;">
                    <legend>&nbsp;</legend>
                    <input type="submit" name="enviar" value="Enviar Datos" onclick="javascript:return validar();">
                    <input type="reset" name="cancelar" value="Cancelar">
                </fieldset>

                <input type="hidden" name="tipo" id="tipo" value="<?=$tipo?>">
                <input type="hidden" name="id_bicicleta" id="id_bicicleta" value="<?=$id_bicicleta?>">
            </fieldset>

        </form>
    </main>
    <footer>
        <?=pie()?>
    </footer>
</body>

</html>