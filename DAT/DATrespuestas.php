<?php 
if (!function_exists('consultar_respuestas')) {
	function consultar_respuestas($criterio,$valor){
    require("DAT/conect.php");
    $SQL="call SP_respuestas_cons('".$criterio."','".$valor."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
    return ($resultado);
	}
}
if (!function_exists('insertar_respuesta')) {
	function insertar_respuesta($respuesta,$correcta,$pregunta){
    require("DAT/conect.php");
    $SQL="call SP_respuestas_ins('".$respuesta."','".$correcta."','".$pregunta."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
	}
}
if (!function_exists('actualizar_respuesta')) {
	function actualizar_respuesta($id,$respuesta,$correcta,$pregunta){
    require("DAT/conect.php");
    $SQL="call SP_respuestas_upd('".$id."','".$respuesta."','".$correcta."','".$pregunta."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
	}
}















 ?>