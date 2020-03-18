<!DOCTYPE html>
<html lang="es">
<?php
require_once 'inc/conn.php';
require_once('inc/session.php');
include("encabezado.php");
include("pie.php");

generar_tit($titulo);
//generar_menu($menu_ppal,1);
#datos bicicletas

if (!perfil_valido(2)) {
	header("location:index.php");
}

$sql = "SELECT compran.*, clientes.*, bicicletas.*
			FROM compran
			INNER JOIN compran ON compran.id_cliente=clientes.id_cliente
			INNER JOIN detalle_compra ON detalle_compra.id_compra=compran.id_compra
			INNER JOIN bicicletas ON bicicletas.id_bicicleta=detalle_compra.id_bicicleta
           	ORDER BY clientes.id_cliente ";
    $rs = $db->query($sql);
	
	$lista="";
	
    if (!$rs) 
    {
		print_r($db->errorInfo());  #CUIDADO - mensajes de error en desarrollo  - en producción se emite mensaje amigable y que no muestre información del sistema
	} else {
		
		foreach($rs as $fila) {
           if (is_null($fila['id_bicicleta'])              
			{            
			    $id_bicicleta="__sin bicicletas__";				
			    $agregarBicicleta=" <a href='abm_compra.php?tipo=A&id_bicicleta={$fila['id_bicicleta']}'> Agregar Bicicleta</a> ";
			} else {
				$id_cliente=utf8_encode($fila['id_cliente']);
				$fecha_compra="(".date('d-m-Y',strtotime($fila['fecha_compra'])).") -";
				$agregarBicicleta=" <a href='abm_compra.php?tipo=M&id_bicicleta={$fila['id_bicicleta']}'> Modificar Bicicleta</a> ";
              	$id_cliente=utf8_encode($fila['id_cliente']);
				$lista.="<li>".
					"  <strong>$nombre  $apellido ----  </strong> $nombre ---- $apellido ". 
					"  $id_cliente".
					"  $fecha_compra ____ ".
					"  <a href='abm_compra.php?tipo=M&id_bicicleta={$fila['id_bicicleta']}'>Modificar</a> | ".
					"  <a href='#' onclick='javascript:borrar({$fila['id_bicicleta']});'>Baja</a>  ".
					"  $agregarBicicleta ".
                    "</li>";                  
        }        		
        }
    }
    
	$rs=null;
    $db=null;
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Compras</title>
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
                    alert("El empleado no se pudo borrar porque tiene un trabajo asociado");
                }
            }
        }
    }

    function borrar(id) {
        var errores = 0;

        // validar ID

        // armar parametros a enviar - forma param1=valo1&param2=valor2 ...
        params = "id_bicicleta=" + id;
        // archivo,  al que se le solcita una tarea  (URL que se va a solicitar via Ajax)
        url = "compra_borrar.php";

        if (errores == 0) {
            if (confirm('¿Está seguro que quiere borrar el empleado?')) {
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

            <a href="abm_compra.php?tipo=A">&raquo;Ingresar una compra</a>

            <h3>Listado de Compras</h3>

            <ul>
                <?=$lista ?>
            </ul>

        </main>


        <footer>
            <?=pie()?>
        </footer>

</body>

</html>