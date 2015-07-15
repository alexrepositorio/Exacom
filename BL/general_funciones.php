<?php 
function transformar_a_lista($resultado){
	if (mysqli_num_rows($resultado)>0) {
    	$lista=mysqli_fetch_all($resultado,MYSQLI_ASSOC);     			   		
   		return($lista);
    }else{
    	return 0;
    }
}
function logout(){

session_start();
session_unset();
session_destroy();

header ('Location: login.php');
	exit (0); 
}



 ?>