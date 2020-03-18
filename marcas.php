<!DOCTYPE html>
<html lang="es">

<?php
require_once 'inc/conn.php';
require_once('inc/session.php');
include("encabezado.php"); 
include("pie.php"); 

generar_tit($titulo);
//generar_menu($menu_ppal,1);
//generar_breadcrumbs($camino_nav,0,"Empleados"); 


#datos empleados-personas
if (!perfil_valido(1)) {
	header("location:index.php");
}
	$sql = "SELECT marcas.*
			FROM marcas		
			ORDER BY nombre_marca ";
	$rs = $db->query($sql);
	
	$lista="";
	
	if (!$rs) {
		print_r($db->errorInfo());  #CUIDADO - mensajes de error en desarrollo  - en producción se emite mensaje amigable y que no muestre información del sistema
	} else {
		
		foreach($rs as $fila) {		
					
			$nombre=utf8_encode($fila['nombre_marca']);
			
			$lista.="<li>".
					"  <strong>$nombre</strong> --- ". 
					"  $nombre --- ".
					"  <a href='abm_marcas.php?tipo=M&id_marca={$fila['id_marca']}'>Modificar</a> | ".
					"  <a href='#' onclick='javascript:borrar({$fila['id_marca']});'>Baja</a> ".
					//"  $agregarTrabajo ".
					"</li>";
		}		
	}

	$rs=null;
    $db=null;
	
?>

<head>
    <meta charset="utf-8">

    <title>Marcas</title>

    <!-- <meta name="description" content="breve descripcion del sitio">
<meta name="keywords" content="palabraclave1,palabraclave2,palabraclave3">
<meta name="robots" content="index,nofollow" > -->

    <link rel="shortcut icon" href="images/Logo-Speed-Bikes.png" type="image/x-icon" />

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/all.min.css">

    <script type="text/javascript">
    function ajax_conn(params, url) {
        var ajax_url;

        /*
        	Obtene una instancia del objeto XMLHttpRequest con el que JavaScript puede comunicarse con el servidor 
        	de forma asíncrona intercambiando datos entre el cliente y el servidor sin interferir en el comportamiento actual de la página. 
        */
        if (window.XMLHttpRequest) {
            conn = new XMLHttpRequest();
        } else if (window.ActiveXObject) { // ie 6
            conn = new ActiveXObject("Microsoft.XMLHTTP");
        }

        conn.onreadystatechange = respuesta;
        /*
        	Preparar la funcion de respuesta
        	cuando exista un cambio de estado se llama a la funcion respuesta (para que maneja la respuesta recibida)
        	la URL solicitada podría devolver HTML, JavaSript, CSS, texto plano, imágenes, XML, JSON, etc.
        */

        ajax_url = url + '?' + params;

        conn.open("GET", ajax_url, true);
        /*
        método XMLHttpRequest.open. 
        - método: el método HTTP a utilizar en la solicitud Ajax. GET o POST.
        url: dirección URL que se va a solicitar, la URL a la que se va enviar la solicitud.
        async: true (asíncrono) o false (síncrono).  -- asíncronico: no se espera la respuesta del servidor - sincronico: se espera la repuesta del servidor
        */

        conn.send(); // Enviamos la solicitud - por metodo GET

        /* Metodo POST  
        conn.open('POST', url);
        			// Si se utiliza el método POST, la solicitud necesita ser enviada como si fuera un formulario
        conn.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        conn.send(parametros);
        */

    }

    function respuesta() {
        /*
        	El valor de readyState 4 indica que la solicitud Ajax ha concluido 
        	y la respuesta desde el servidor está disponible en XMLHttpRequest.responseText
        */
        if (conn.readyState == 4) { // estado de conexión es completo - response.success
            if (conn.status == 200) { // estado devuelto por el HTTP fue "OK" 
                // conn.responseText - repuesta del servidor
                if (conn.responseText == 1) {
                    location.reload(); // se borro un empleado - se refresca la pag
                } else {
                    alert("la marca no se pudo borrar");
                }
            }
        }
    }

    function borrar(id) {
        var errores = 0;

        // validar ID

        // armar parametros a enviar - forma param1=valo1&param2=valor2 ...
        params = "id_marca=" + id;
        // archivo,  al que se le solcita una tarea  (URL que se va a solicitar via Ajax)
        url = "marcas.php";

        if (errores == 0) {
            if (confirm('¿Está seguro que quiere borrar la marca?')) {
                ajax_conn(params, url);
            }
        }
    }
    </script>
</head>

<body>
    <div class="container">
        <header>
            <?php echo crear_barra(0); ?>
            <div id="encab">
                <?=$titulo?>
            </div>
        </header>

        <main id="cuerpo">

            <a href="abm_marcas.php?tipo=A">&raquo;Ingresar una marca</a>

            <h3>Listado de Usuarios</h3>
            <ul>
                <?=$lista ?>
            </ul>

        </main>

        <footer>
            <?=pie()?>
        </footer>

</body>

</html>