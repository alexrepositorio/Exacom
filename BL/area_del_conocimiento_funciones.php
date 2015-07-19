<?php 
include("CLASES/area_conocimiento.php");
if (!function_exists('area_consultar')){
function area_consultar($criterio,$valor){
		foreach (glob("DAT/*.php") as $filename)
		{
			include $filename;
		}
	    $resultado=consultar_area($criterio,$valor);
	    return (transformar_a_lista($resultado));
	}
}
if (!function_exists('area_insertar')){
function area_insertar($malla){
	foreach (glob("DAT/*.php") as $filename)
	{
		include $filename;
	}
    insertar_area($malla);
	}
}
 ?>