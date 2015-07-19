<?php 
include("CLASES/materia.php");
if (!function_exists('consultar_materia')){
	require("DAT/DATmateria.php");
	function consultar_materia($criterio,$valor){
    $resultado=materias_consultar($criterio,$valor);
    return (transformar_a_lista($resultado));
	}
}
if (!function_exists('insertar_materia')){
	require("DAT/DATmateria.php");
	function insertar_materia($materia,$malla){
	$materiaa=new materia();
	$materiaa->__construct2($materia,$malla);
   	materia_insertar($materiaa->get_nombre(),$materiaa->get_id_area());
	}
}
if (!function_exists('eliminar_materia')) {
	require("DAT/DATmateria.php");
	function eliminar_materia($id){
    	materia_eliminar($id);
	}
}
 ?>