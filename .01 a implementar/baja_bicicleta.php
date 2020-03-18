<!DOCTYPE html>
	<html lang="es">
<?php
include("encabezado.php"); 
include("pie.php"); 

generar_tit($titulo);
generar_menu($menu_ppal,1);

?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
	
	<title>Formulario Modificacion Bicicleta </title>

	<meta name="description" content="breve descripcion del sitio">
	<meta name="keywords" content="palabraclave1,palabraclave2,palabraclave3">
	<meta name="robots" content="index,nofollow" >

	<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon"/>
	
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
	
	<!-- jQuery first, then Popper.js (incluido en .blunde.min.js), then Bootstrap JS -->
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.bundle.min.js" ></script>
	
	
	<script>
	function Borrar_Datos{
	document.getElementbyId("datos").reset(); }
	
	</script>
</head>
<body>
	<h1>Formulario para Baja de Bicicletas</h1></br>
<form id="datos" action="Baja_Bicicleta.html" method="post" novalidate> 
	<fieldset>
	<legend>Marca y Modelo </legend>
	Marca
	<input type="text" name="Marca" id="Marcas" value="" maxlength="35"  title="Ingrese una marca"  required>	<br/>
	Modelo
	<input type="text" name="Modelo" id="Modelos" value="" maxlength="35"  title="Ingrese un modelo"  required>	<br/>
	</fieldset>
	<fieldset>
	<legend>Tipo de Bicicleta </legend>
	
	<input type="radio" name="Tipo" id="Tipo1" value="0"  checked="checked"> <label for="Tipo1" class="label1">Mountain Bike</label>	<br/>
	<input type="radio" name="Tipo" id="Tipo2" value="0"  checked=""> <label for="Tipo2" class="label1">Ruta</label>	<br/>
	<input type="radio" name="Tipo" id="Tipo3" value="0"  checked=""> <label for="Tipo3" class="label1">Triatlon</label>	<br/>
	<input type="radio" name="Tipo" id="Tipo4" value="0"  checked=""> <label for="Tipo4" class="label1">Niños</label>	<br/>
	<input type="radio" name="Tipo" id="Tipo5" value="0"  checked=""> <label for="Tipo5" class="label1">BMX/FreeStyle/Dirt</label>	<br/>
	<input type="radio" name="Tipo" id="Tipo6" value="0"  checked=""> <label for="Tipo6" class="label1">Paseo/Urbanas</label>	<br/>
	<input type="radio" name="Tipo" id="Tipo7" value="0"  checked=""> <label for="Tipo7" class="label1">Plegables</label>  <br/>
	</fieldset>
	<fieldset>
	<legend>Botones </legend>
	<input type="submit" name="Guardar" id="Guardar" value="Guardar">
	<input type="submit" name="Borrar" id="Borrar" value="Borrar" onclick="javascript:return Borrar_Datos();">
	<input type="submit" name="Cancelar" id="Cancelar" value="Cancelar">
	
	</fieldset>
<div class="container">
<!--	<header>
		<?php echo crear_barra(); ?>
		
		<div id="encab">
			<?=$titulo?>
			<?=$menu_ppal?> 
		</div>
	</header>
-->
<main id="cuerpo">
	<div class="div_ini" >
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
	
	</main>	
	
	
</form>	
</body>
</html>