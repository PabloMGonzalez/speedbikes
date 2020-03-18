<!DOCTYPE html>
<html lang="es">
<?php

require_once 'inc/conn.php';
require_once('inc/session.php');
include("encabezado.php"); 
include("pie.php"); 

generar_tit($titulo);

define('SEMILLA', '34a@$#aA9823$');


if (!perfil_valido(1)) {
	header("location:index.php");}

	$mail=(isset($_POST["mail"]) && !empty($_POST["mail"]))? $_POST["mail"]:"";

	#pregunta si se hizo clic en el botón 'enviar', es decir si se enviaron los datos ingresados en el formulario al servidor
	$btn =(isset($_POST['enviar']) && !empty($_POST['enviar']))? true:false;

	
		function inicializar_vars() {
		global $psw, $nombre, $apellido, $telefono, $mail, $desc_usuario, $desc ;
		
		$psw= $nombre= $apellido= $telefono= $mail= $desc_usuario= $desc="";
		}

		# recupera datos enviados por el metodo post	
		function recuperar_datos() {
		global $nombre, $apellido, $mail, $psw, $psw1, $perfil, $telefono, $desc_usuario, $pers_id, $tipo, $desc ;
		
			$pers_id =(isset($_POST['pers_id']) && !empty($_POST['pers_id']))? $_POST['pers_id']:"";
			$tipo =(isset($_POST['tipo']) && !empty($_POST['tipo']))? $_POST['tipo']:"A"; 	

			$nombre=(isset($_POST["nombre"]) && !empty($_POST["nombre"]))? $_POST["nombre"]:"";
			$apellido=(isset($_POST["apellido"]) && !empty($_POST["apellido"]))? $_POST["apellido"]:"";
			$mail=(isset($_POST["mail"]) && !empty($_POST["mail"]))? $_POST["mail"]:"";
			$psw=(isset($_POST["psw"]) && !empty($_POST["psw"]))? $_POST["psw"]:"";
			$psw1=(isset($_POST["psw1"]) && !empty($_POST["psw1"]))? $_POST["psw1"]:"";
			$desc=(isset($_POST["perfil"]) && !empty($_POST["perfil"]))? $_POST["perfil"]:"";
			$telefono=(isset($_POST["telefono"]) && !empty($_POST["telefono"]))? $_POST["telefono"]:"";
			$desc_usuario=(isset($_POST["desc_usuario"]) && !empty($_POST["desc_usuario"]))? $_POST["desc_usuario"]:"";

			
			$salt = SEMILLA;		
			$psw = hash('sha512', $salt.$psw);
			$psw1 = hash('sha512', $salt.$psw1);

			if ($desc=="A")
			{
				$desc_usuario="Administrador";
			}
			else if($desc=="E")
			{
				$desc_usuario="Encargado";
			}
			else{
				$desc_usuario="Cliente";
			}
					
		}

		function mismo_mail()	
		{			
			global $mail, $rs, $db, $perfil;
			
			$sql = "SELECT mail 
					FROM clientes					
					ORDER BY mail											
					";
			$rs = $db->query($sql);

			if ($perfil=="A") {

			if ($rs) {
				foreach ($rs as $reg) {
					if ($mail == $reg['mail']) {
						$msj="El mail ya esta en uso";
						echo "<script language='javascript'>alert('$msj');window.location.href='personas_abm.php'</script>";
						exit;        		
						}
					}
				}
			}
		}

		#funcion que valida los datos recuprados del formulario por PHP 
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
				 if ($apellido == null || trim($apellido)=="")
				 {
					$msj .= "Debe ingresar un apellido" . '\n';
					$errores++;
				 }			 
				if (filter_var($mail, FILTER_VALIDATE_EMAIL) == "")
				 {				
				 	$msj .= "Debe ingresar un mail valido" . '\n';
				 	$errores++;
				 }
				 if ($psw == null || trim($psw)=="")
				 {
					$msj .= "Debe ingresar una contraseña" . '\n';
					$errores++;
				 }				 
				 if ($psw1 != $psw || trim($psw1)=="")
				 {
					$msj .= "Las contraseñas deben coincidir" . '\n';
					$errores++;
				 }
				 if (filter_var($telefono, FILTER_VALIDATE_INT) == "")
				 {
					$msj .= "Debe introducir un telefono valido" . '\n';
					$errores++;
				 }
				 if ($desc == null || trim($desc)=="")
				 {
					$msj .= "Debe introducir un perfil" . '\n';
					$errores++;
				 }

				 if ($errores == 0)
            		return true;
        		 else
					echo "<script language='javascript'>alert('$msj');window.location.href='personas_abm.php'</script>";
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
			$pers_id =(isset($_GET['id_cliente']) && !empty($_GET['id_cliente']))? $_GET['id_cliente']:"";
			$tipo =(isset($_GET['tipo']) && !empty($_GET['tipo']))? $_GET['tipo']:"A"; 

			#Valida datos ingresados - 	 $pers_id-$tipo 
			#validar_datos();

			#si es un alta inicaliza los datos en vacio, sino busca los datos de la persona	
			if ($tipo=="A") {
				inicializar_vars();
			} else {
				$sql = "SELECT * 
						FROM clientes
						WHERE id_cliente=$pers_id
					";
				$rs = $db->query($sql)->fetch();
				
				if ($rs){
					$nombre=$rs['nombre'];
					$apellido=$rs['apellido'];
					$mail=$rs['mail'];
					$desc=$rs['perfil'];
					$psw=$rs['psw'];
					$desc_usuario=$rs['desc_usuario'];
					$telefono=$rs['telefono'];
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

		# chequear que no se ingrese un mail que ya exista
		###############################
		mismo_mail();			
				
		#ver si es una modificación o un alta
		if ($tipo=="M") {
			$sql="UPDATE clientes SET 
					apellido=?, nombre=?, mail=?, perfil=?, psw=?, telefono=?, desc_usuario=?  
				  WHERE id_cliente=$pers_id
				";
			$sql = $db->prepare($sql);
			$sqlvalue=[$apellido,$nombre,$mail,$desc,$psw,$telefono,$desc_usuario];
			$rs = $sql->execute($sqlvalue);
	

			if (!$rs) {
				print_r($db->errorInfo());  #desarrollo
			} else {
				header("location:personas.php");
			}
			$rs=null;

		} else {   #es un alta 

			$sql = "INSERT INTO clientes(apellido,nombre,mail,psw,perfil,telefono,desc_usuario) VALUES(?,?,?,?,?,?,?)"; 
			$sql = $db->prepare($sql);
			$sqlvalue=[$apellido,$nombre,$mail,$psw,$desc,$telefono,$desc_usuario];
			$rs = $sql->execute($sqlvalue);

			if (!$rs) {
				print_r($db->errorInfo());  #desarrollo
			} else {
				header("location:personas.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Personas</title>

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


    <script type="text/javascript"></script>

    <script>
    //validaciones por JavaScript
    function validar() {
        var errores = 0,
            msj = "";

        nomb = document.getElementById("psw").value;
        if (nomb == null || nomb.trim() == "") {
            msj += "Debe ingresar una contraseña" + "\n";
            errores++;
        }
        nomb1 = document.getElementById("psw1").value;
        if (nomb1 == null || nomb1.trim() == "") {
            msj += "Debe repetir la contraseña" + "\n";
            errores++;
        }
        if (nomb != nomb1) {
            msj = "Las contraseñas deben ser iguales" + "\n";
            errores++;
        }
        nomb1 = document.getElementById("perfil").selectedIndex;
        if (nomb1 == 0 || nomb1 == null) {
            msj += "Debe ingresar un perfil" + "\n";
            errores++;
        }
        nomb = document.getElementById("mail").value;
        if (!validar_email(nomb)) {
            msj += "Debe introducir un mail valido" + "\n";
            errores++;
        }
        nomb = document.getElementById("telefono").value;
        if (!validar_telefono(nomb)) {
            msj += "Debe introducir un telefono valido" + "\n";
            errores++;
        }

        if (errores == 0)
            return true;
        else
            alert(msj);
        return false;
    }

    function validar_telefono(telefono) {
        var regex = /^(?:(?:00)?549?)?0?(?:11|[2368]\d)(?:(?=\d{0,2}15)\d{2})??\d{8}$/g;
        return regex.test(telefono) ? true : false;
    }

    function validar_email(email) {
        var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email) ? true : false;
    }

    function Borrar_Datos() {
        document.getElementbyId("datos").reset();
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

        <form action="personas_abm.php " method="post" onsubmit="return validar()">
            <fieldset>
                <legend>Datos</legend>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?=$nombre?>" maxlength="60" required><br>

                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" value="<?=$apellido?>" maxlength="60" required><br>

                <label for="mail">Mail</label>
                <input type="text" name="mail" id="mail" value="<?=$mail?>" maxlength="60" required>

                <label for="psw">Contraseña</label>
                <input type="text" name="psw" id="psw" value="<?=$psw?>" maxlength="8" required>

                <label for="psw1">Repetir Contraseña</label>
                <input type="text" name="psw1" id="psw1" value="" maxlength="8" required>

                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" value="<?=$telefono?>" maxlength="15">

                <label for="perfil">Perfil</label>

                <select id="perfil" name="perfil"> <br>
                    <option value="seleccionar" selected="selected">&lt;&lt;Seleccione una opción&gt;&gt;</option>

                    <option value="A">A</option>
                    <option value="E">E</option>
                    <option value="C">C</option>
                </select>

                <input type="hidden" name="desc_usuario" id="desc_usuario" value="<?=$desc_usuario?>" maxlength="15">

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