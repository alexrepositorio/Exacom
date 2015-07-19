<?php 
if (!function_exists('materias_consultar')) {
	function materias_consultar($criterio,$valor){
    require("DAT/conect.php");
    $SQL="call SP_materias_cons('".$criterio."','".$valor."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
    return ($resultado);
	}
}
if (!function_exists('materia_insertar')) {
	
function materia_insertar($materia,$malla){
    require("DAT/conect.php");
   	$SQL="call SP_materias_ins('".$materia."','".$malla."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
	}
}
if (!function_exists('materia_eliminar')) {
	function materia_eliminar($id){
    require("DAT/conect.php");
   	$SQL="call SP_materia_del('".$id."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
	}
}
 ?>