<?php

    function pie()
    {
        $pie='
		<div class="container">
		<div class="row">
		
		<div id="pie" class="col"> 
		
		<h4>Secciones</h4>

		<ul class="nav flex-column">
    		<li class="nav-item">
				<a href="index.php">Inicio</a>
				<br>
				<br>
			</li>
			<li class="nav-item">
				<a  href="bicicletas.php">Bicicletas</a>
				<br>
				<br>
    		</li>
	
    		<li class="nav-item">
				<a  href="contacto.php">Contacto</a>
				<br>
				<br>	
			</li>
			<li class="nav-item">
				<a  href="login.php">Login</a>
				<br>
				<br>	
    		</li>
    		<li class="nav-item">
        		<a  href="register.php">Registrarse</a>
    		</li>    
		</ul>

		</div>		

		<div id="pie" class="col"> 
		<h4>Seguinos en !</h4>
			<a href="#" target="_blank"><img src="images/facebook_logo.jpg" style="width:70px;"> </a>
			<a href="#" target="_blank"><img src="images/instagram_logo.jpg" style="width:70px"> </a>
			<br/>
			<h5>Contacto:</h5>
			Tomás Mate 1506, Bahia Blanca <br>
			Telefono:455-9684 <br>

			<a href="mailto:speedbikesl@hotmail.com" title="enviar mail">speedbikes@gmail.com</a>	
		</div>
		</div>
		<div class="row card-footer text-muted card text-right">
    		 <font size=1>@ Diseño por Emanuel Corradi y Pablo González
  		</div>		
		';
        return $pie;
    }