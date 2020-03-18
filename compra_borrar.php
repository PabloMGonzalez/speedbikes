<?php

require 'inc/session.php';
require 'inc/conn.php';


$id_compra =( isset($_GET['id_compra']) && !empty($_GET['id_compra']))? $_GET['id_compra']:0;

#verificar que sea numero

$rta=0;

$borrar=false;

if ($id_compra<>0) {


	$sql1="SELECT * FROM compran WHERE id_compra=$id_compra";
	$rs1 = $db->query($sql)->fetch();
	
	$sql2="SELECT * FROM detalle_compra WHERE id_compra=$id_compra";
	$rs2 = $db->query($sql)->fetch();
	
	if (($rs1) ||($rs2)) {  // 
		$borrar=true;
	}
	$rs=null;
		
	if ($borrar) { 
		$sql1="DELETE FROM compran WHERE id_compra=?";  // $pers_id
		$sql1=$db->prepare($sql1);
		$sqlvalue1=[$pers_id];
		$sql2="DELETE FROM detalle_compra WHERE id_compra=?";  // $pers_id
		$sql2=$db->prepare($sql2);
		$sqlvalue2=[$pers_id];
				
		if (!$sql1->execute($sqlvalue1)) {  
			$rta=0;
		} else {
			$rta=1;
		}
		
		$rs1=null;
		if (!$sql2->execute($sqlvalue2)) {  
			$rta=0;
		} else {
			$rta=1;
		}
		
		$rs2=null;
		
	}
}

$db=null;  

	
echo $rta; 

?>