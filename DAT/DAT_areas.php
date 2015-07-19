<?php 

if (!function_exists('consultar_area')){
	function consultar_area($criterio,$valor){
    	require("DAT/conect.php");
	    $SQL="call SP_titulaciones_cons('".$criterio."','".$valor."')";
	    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
		require("DAT/config_disconnect.php");
	    return ($resultado);
	}
}
if (!function_exists('insertar_area')){
	function insertar_area($malla){
    require("DAT/conect.php");
    $SQL="call SP_titulaciones_ins('".$malla."')";
	mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
	}
}






 ?>