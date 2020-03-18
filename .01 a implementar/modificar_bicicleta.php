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
	
	<title>Validacion de datos javascript formulario Baja  producto</title>
	<script>
	function Borrar_Datos{
	document.getElementbyId("datos").reset(); }
	
	</script>
</head>
<body>
	<h1>Formulario para Modificacion de Bicicletas</h1> </br>
<form id="datos" action="Modificar_Bicicleta.html" method="post" novalidate> 
	<fieldset>
	<legend>Marca y Modelo </legend>
	Marca
	<input type="text" name="Marca" id="Marcas" value="" maxlength="35"  title="Ingrese una marca"  required>	<br/>
	Modelo
	<input type="text" name="Modelo" id="Modelos" value="" maxlength="35"  title="Ingrese un modelo"  required>	<br/>
	<label for="Rodado">Rodado</label> 
		<select id="Rodado" name="Rodado" size=6 >
					<option value="-1" selected="selected">&lt;&lt;Seleccione una opción&gt;&gt;</option>
					<optgroup label="Mountain Bike">
						<option value="26">26"</option>
						<option value="27.5">27.5"</option>
						<option value="29">29"</option>
					</optgroup>
					<optgroup label="Ruta">
						<option value="28">28"</option>
					</optgroup>
					<optgroup label="Mountain Bike">
						<option value="26">26"</option>
						<option value="27.5">27.5"</option>
						<option value="29">29"</option>
					</optgroup>
					<optgroup label="Triatlon">
						<option value="28">28"</option>
					</optgroup>
					<optgroup label="Niños">
						<option value="12">12"</option>
						<option value="16">16"</option>
						<option value="20">20"</option>
						<option value="24">24"</option>
					</optgroup>
					<optgroup label="BMX/FreeStyle/Dirt">
						<option value="20">20"</option>
					</optgroup>
					<optgroup label="Paseo/Urbanas">
						<option value="26">26"</option>
					</optgroup>
					<optgroup label="Plegables">
						<option value="20">20"</option>
					</optgroup>
		</select>
	
	
	
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
	<fieldset>
	<legend>Caracteristicas</legend>
	Cuadro  <input type="text" name="Cuadro" id="Cuadro" value="" maxlength="35"  title="Ingrese texto"  size="15" required> <br/>
	Horquilla  <input type="text" name="Horquilla" id="Horquilla" value="" maxlength="35"  title="Ingrese texto" size="13" required> <br/>
	Ruedas  <input type="text" name="Ruedas" id="Ruedas" value="" maxlength="35"  title="Ingrese texto" size="15" required> <br/>
	Cubiertas  <input type="text" name="Cubiertas" id="Cubiertas" value="" maxlength="35"  title="Ingrese texto" size="13" required> <br/>
	Platos  <input type="text" name="Platos" id="Platos" value="" maxlength="35"  title="Ingrese texto" size="16" required> <br/>
	Caja Pedalera  <input type="text" name="Caja_Pedalera" id="Caja_Pedalera" value="" maxlength="35"  title="Ingrese texto" size="9" required> <br/>
	Cadena  <input type="text" name="Cadena" id="Cadena" value="" maxlength="35"  title="Ingrese texto" required size="15"> <br/>
	Cassette  <input type="text" name="Cassette" id="Cassette" value="" maxlength="35"  title="Ingrese texto" size="14" required> <br/>
	Descarrilador  <input type="text" name="Descarrilador" id="Descarrilador" value="" maxlength="35"  title="Ingrese texto" size="9" required> <br/>
	Cambio  <input type="text" name="Cambio" id="Cambio" value="" maxlength="35"  title="Ingrese texto" size="14" required> <br/>
	Shifters  <input type="text" name="Shifters" id="Shifters" value="" maxlength="35"  title="Ingrese texto" size="14" required> <br/>
	Manubrio  <input type="text" name="Manubrio" id="Manubrio" value="" maxlength="35"  title="Ingrese texto" size="12" required> <br/>
	Stem  <input type="text" name="Stem" id="Stem" value="" maxlength="35"  title="Ingrese texto" size="16" required> <br/>
	Asiento  <input type="text" name="Asiento" id="Asiento" value="" maxlength="35"  title="Ingrese texto" size="14" required> <br/>
	Poste  <input type="text" name="Caño_Portasilla" id="Caño_Portasilla" value="" maxlength="35"  title="Ingrese texto" size="16" required> <br/>
	</fieldset>
	<fieldset>
	<br/>
	<fieldset>
	<legend>Botones </legend>
	<input type="submit" name="Guardar" id="Guardar" value="Guardar">
	<input type="submit" name="Borrar" id="Borrar" value="Borrar" onclick="javascript:return Borrar_Datos();">
	<input type="submit" name="Cancelar" id="Cancelar" value="Borrar">
	
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