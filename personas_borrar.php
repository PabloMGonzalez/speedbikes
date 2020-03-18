<?php

require 'inc/session.php';
require 'inc/conn.php';


$pers_id =( isset($_GET['id_cliente']) && !empty($_GET['id_cliente']))? $_GET['id_cliente']:0;

#verificar que sea numero

$rta=0;

$borrar=false;

if ($pers_id<>0) {


	$sql="SELECT * FROM clientes WHERE id_cliente=$pers_id";
	$rs = $db->query($sql)->fetch();
	
	if ($rs) {  
		$borrar=true;
	}
	$rs=null;
		
	if ($borrar) { 
		$sql="DELETE FROM clientes WHERE id_cliente=?";  // $pers_id
		$sql=$db->prepare($sql);
		$sqlvalue=[$pers_id];
		
		if (!$sql->execute($sqlvalue)) {  
			$rta=0;
		} else {
			$rta=1;
		}
		
		$rs=null;
	}
}

$db=null;  

	
echo $rta; 

?>