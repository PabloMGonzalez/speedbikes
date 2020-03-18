<!DOCTYPE html>
<html lang="es">
<?php

require_once 'inc/conn.php';
require_once('inc/session.php');
include("encabezado.php"); 
include("pie.php"); 

generar_tit($titulo);

if (!perfil_valido(2)) {
	header("location:index.php");}

	#pregunta si se hizo clic en el botón 'enviar', es decir si se enviaron los datos ingresados en el formulario al servidor
	$btn =(isset($_POST['enviar']) && !empty($_POST['enviar']))? true:false;
	
		function inicializar_vars() {
		global $nombre ;
		
		$nombre="";
		}

		# recupera datos enviados por el metodo post	
		function recuperar_datos() {
		global $nombre, $tipo ;
		
			$pers_id =(isset($_POST['id_marcas']) && !empty($_POST['id_marcas']))? $_POST['id_marcas']:"";
			$tipo =(isset($_POST['tipo']) && !empty($_POST['tipo']))? $_POST['tipo']:"A"; 	

			$nombre=(isset($_POST["nombre"]) && !empty($_POST["nombre"]))? $_POST["nombre"]:"";			
	
		}

		#funcion que valida los datos recuprados del formulario 
		function validar_datos() {
			global $nombre, $mail, $apellido, $psw, $psw1, $telefono, $desc;

			$errores = 0;
            $msj = "";      
		
			if ($_SERVER['REQUEST_METHOD'] == 'POST')
			{				
				 if ($nombre == null || trim($nombre)=="")
				 {
					$msj .= "Debe ingresar un nombre" . '\n';
					$errores++;
				 }
				 if ($errores == 0)
            		return true;
        		 else
					echo "<script language='javascript'>alert('$msj');window.location.href='abm_marcas.php'</script>";
					exit;        		
			}		
		}			

		function mismo_nombre()
		{
			global $nombre, $rs, $db;

			$sql = "SELECT nombre_marca
					FROM marcas					
					ORDER BY nombre_marca											
					";
			$rs = $db->query($sql);

			if ($rs) {
				foreach ($rs as $reg) {
					if ($nombre == $reg['nombre_marca']) {
						$msj="Ya existe una Marca con ese nombre";
						echo "<script language='javascript'>alert('$msj');window.location.href='abm_marcas.php'</script>";
						exit;        		
						}
					}
				}	
		}
	
	inicializar_vars();
	
	if (!$btn) { 
				# no hizo clic en el botón 'enviar'(de tipo submit), la solicitud viene de la página personas.php (por medio de un enlace - utilizando metodo GET)
				# puede ser un alta o modificacion  
				# recuperar el id de la persona y tipo de operación por medio del método GET
				# el id y tipo deben ser cargados en los inputs ocultos del formulario para saber que operación fue la que se solicitó
				#seleccionar los datos según el identificador de la persona ingresado
			$pers_id =(isset($_GET['id_marca']) && !empty($_GET['id_marca']))? $_GET['id_marca']:"";
			$tipo =(isset($_GET['tipo']) && !empty($_GET['tipo']))? $_GET['tipo']:"A"; 

			#Valida datos ingresados - 	 $pers_id-$tipo 
			#validar_datos();

			#si es un alta inicaliza los datos en vacio, sino busca los datos de la persona	
			if ($tipo=="A") {
				inicializar_vars();
			} else {
				$sql = "SELECT * 
						FROM marcas
						WHERE id_marca=$pers_id
					";
				$rs = $db->query($sql)->fetch();
				
				if ($rs){
					$nombre=$rs['nombre_marca'];				
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

		validar_datos();

		mismo_nombre();
			
		# chequear que no se ingrese un documento que ya exista
		###############################
			
		#ver si es una modificación o un alta
		if ($tipo=="M") {
			$sql="UPDATE marca SET 
						nombre_marca=?  
				  WHERE id_marca=$pers_id
				";
			$sql = $db->prepare($sql);
			$sqlvalue=[$nombre];
			$rs = $sql->execute($sqlvalue);
	

			if (!$rs) {
				print_r($db->errorInfo());  #desarrollo
			} else {
				header("location:marcas.php");
			}
			$rs=null;

		} else {   #es un alta 

			$sql = "INSERT INTO marcas(nombre_marca) VALUES(?)"; 
			$sql = $db->prepare($sql);
			$sqlvalue=[$nombre];
			$rs = $sql->execute($sqlvalue);

			if (!$rs) {
				print_r($db->errorInfo());  #desarrollo
			} else {
				header("location:marcas.php");
				# Una vez hecho el alta o modificación volver a la página personas.php
			}
			$rs=null;
		}
	}
	
	$rs=null;
    $db=null;
?>

<head>
    <meta charset="utf-8">

    <title>Personas ABM</title>

    <!-- <meta name="description" content="breve descripcion del sitio">
	<meta name="keywords" content="palabraclave1,palabraclave2,palabraclave3">
	<meta name="robots" content="index,nofollow" > -->

    <link rel="shortcut icon" href="images/Logo-Speed-Bikes.png" type="image/x-icon" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/all.min.css">


    <script type="text/javascript"></script>

    <script>
    //validaciones por JavaScript
    function validar() {
        var errores = 0,
            msj = "";

        nomb = document.getElementById("nombre").value;
        if (nomb == null || nomb.trim() == "") {
            msj += "Debe ingresar un nombre" + "\n";
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

<body>

    <header>

        <?php echo crear_barra(0);?>
        <nav id="encab">
            <?=$titulo?>
        </nav>

    </header>

    <main id="cuerpo">

        <h3> Registrar</h3>

        <form action="abm_marcas.php " method="post" onsubmit="return validar()">
            <fieldset>
                <legend>Datos</legend>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?=$nombre?>" maxlength="60" required><br>

                <input type="hidden" name="tipo" id="tipo" value="<?=$tipo?>">
                <input type="hidden" name="pers_id" id="pers_id" value="<?=$pers_id?>">
            </fieldset>

            <fieldset id="btn" style="text-align:right;">
                <legend>&nbsp;</legend>
                <input type="submit" name="enviar" value="Enviar Datos" onclick="javascript:return validar();">
                <input type="reset" name="cancelar" value="Cancelar">
            </fieldset>
        </form>

    </main>

    <footer>
        <?=pie()?>
    </footer>

</body>

</html>