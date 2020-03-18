<?php
 
    #genera titulo
    function generar_tit(&$tit)
    {
        $tit = '<a href="index.php" title="logo Speed Bikes">
					<img class="rounded mx-auto d-block" src="images\banner.png" alt="logo Speed Bikes" style="margin-right:2em;">
				</a>							
				
				<div class="container" style="margin-top: 10px;">
  				<div class="row justify-content-md-center">
			  	<div class="col-md-auto">
				<input id="filter" class="fa-align-center" style="width:600px" type="text" placeholder="Buscar, bicicletas, marcas, rodados, estilos..." />
					<i id="filtersubmit" class="fa fa-search fa-align-center"></i>
				</div>
				</div>
				</div>
									
				';
    }
            
    #genera barra superior
    function crear_barra($sel)
    {
		$var='<nav class="navbar navbar-expand-lg navbar-light bg-light">	

		<a class="navbar-brand" href="index.php"><img src="images\Logo-Speed-Bikes.png" alt="logo Speed Bikes" style="width:50px;"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
	  
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
		  <ul class="navbar-nav mr-auto">
		
			<li class="nav-item">
			  <a class="nav-link" href="Contacto.php">Contacto</a>
			</li>			
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Bicicletas por Marca
			  </a>
			  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#">Scott</a>
				<a class="dropdown-item" href="#">Cannondale</a>				
				<a class="dropdown-item" href="#">Giant</a>
				<a class="dropdown-item" href="#">Teknial</a>
				<a class="dropdown-item" href="#">Cube</a>
				<a class="dropdown-item" href="#">Olmo</a>
				<a class="dropdown-item" href="#">Mongoose</a>
				<a class="dropdown-item" href="#">SBK</a>
				<a class="dropdown-item" href="#">Fire Bird</a>
				<a class="dropdown-item" href="#">Haro</a>
				<a class="dropdown-item" href="#">Orbea</a>
				<a class="dropdown-item" href="#">Trinx</a>
			  </div>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Bicicletas por Estilo
			  </a>
			  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#">Mountain Bike</a>
				<a class="dropdown-item" href="#">Ruta</a>				
				<a class="dropdown-item" href="#">Triatlon</a>
				<a class="dropdown-item" href="#">Niños</a>
				<a class="dropdown-item" href="#">Bmx</a>
				<a class="dropdown-item" href="#">Paseo/Urbanas</a>
				<a class="dropdown-item" href="#">Plegables</a>				
			  </div>
			</li>
			<li class="nav-item dropdown">
			  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Bicicletas por Rodado
			  </a>
			  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="#">12</a>
				<a class="dropdown-item" href="#">16</a>
				<a class="dropdown-item" href="#">20</a>
				<a class="dropdown-item" href="#">24</a>
				<a class="dropdown-item" href="#">26</a>
				<a class="dropdown-item" href="#">27.5</a>
				<a class="dropdown-item" href="#">28</a>
				<a class="dropdown-item" href="#">29</a>	   
			  </div>
			</li>
			</ul>';

			global $menu1, $perfil;

			$menu="";
		
			$clase1 = ($sel==1)? "menuactual":"";
			if ($perfil=="A") {
			
				$menu.= '<a class="nav-link" href="personas.php" title="Administracion de personas" class="$clase1"> Personas </a>';
			}
			
			$clase1 = ($sel==2)? "menuactual":"";
			
			if ($perfil=="A" || $perfil=="E") {
				
				$menu.= '<a class="nav-link" href="bicicletas.php" title="Administracion de bicicletas" class="$clase1"> Bicicletas </a>'
				.'<a class="nav-link" href="marcas.php" title="Administracion de marcas" class="$clase1"> Marcas </a>'
				.'<a class="nav-link" href="compra.php" title="Administracion de compras" class="$clase1"> Compras </a>' ;
				
			}	
	
			$clase1 = ($sel==3)? "menuactual":"";
		
			$menu.= '<a class="nav-link" href="consulta_bicicletas.php" title="Consulta bicicletas" class="$clase1"> Consultas </a>';
	  
			
        global $user;
    
        if ($user=="") {
			$links ='<a class="nav-link" href="register.php" title="crear una cuenta de usuario">Registrarse<span class="sr-only">(current)</span></a>
					<a class="nav-link" href="login.php" title="iniciar session">Login<span class="sr-only">(current)</span></a>
					</div>
					</nav>';
					
        } else {
			$links="<span> {$_SESSION['nombre']} </span> &nbsp;".
					 "<a href='cerrar_sesion.php' title='cerrar sesión de usuario'> X </a>
					 </div>
					</nav>";
		}   

		$barra_sup ="<div class='navbarSupportedContent'> $var $menu $links </div> ";		
		
		return  $barra_sup;		
       
	}
	
	function perfil_valido($opcion) {
	global $perfil;
	 		switch($opcion){
	 			case 1: 
	 				$valido=($perfil=="A")? true:false;
	 				break;
	 			case 2: 
	 				$valido=($perfil=="A" || $perfil=="E")? true:false;
	 				break;	
	 			case 3: 
	 				$valido=true;
	 				break;
	 			default:
	 				$valido=false;
	 		}			
	 		return $valido;			
	 	}
                 

      
    // # genera el menu principal y selecciona el item indicado
    // # menu: 0,index  - 1, consultas - 2,m. deshabilitado
    // function generar_menu(&$menu_ppal, $sel)
    // {
    //     global $menu1, $perfil;
    
    //     $menu="";
        
    //     $clase1 = ($sel==1)? "active":"";
    
    //     $menu.= " <li class='nav-item'>".
    //             "	<a href='index.php' class='nav-link $clase1' title='página inicial del sitio'>Home</a>".
    //             "</li>";
        
    //     $clase1 = ($sel==2)? "active":"";
        
    //     $menu.= "<li class='nav-item'>".
    //             "	<a  href='personas_cons.php' class='nav-link $clase1' title='ver consulta de personal'>Consultas</a>".
    //             "</li>";
    
    //     $clase1 = ($sel==3)? "active":"";
    
    //     $menu.= "<li class='nav-item'>".
    //             "	<a href='#' class='nav-link disabled'>Menú deshabilitado</a>".
    //             "</li>";

                
    //     $menu_ppal = "
    // 		<nav class='menu'>
    // 			<ul class='nav nav-pills'>
    // 				$menu
    // 			</ul>
    // 		</nav>
    // 		";
    // }