<?php 
include("CLASES/cuestionario.php");	

if (!function_exists('cuestionario_consultar')){
	foreach (glob("DAT/*.php") as $filename)
				{
					include $filename;
				}
	function cuestionario_consultar($criterio,$valor){
	$res=consultar_cuestionario($criterio,$valor);
	return(transformar_a_lista($res));
	}
}

if (!function_exists('cuestionario_autorizar')){
	foreach (glob("DAT/*.php") as $filename)
	{
		include $filename;
	}
	function cuestionario_autorizar($id){
   		autorizar_cuestionario($id);
	}

}
if (!function_exists('cuestionario_eliminar')){
	foreach (glob("DAT/*.php") as $filename)
	{
		include $filename;
	}
	function cuestionario_eliminar($id){
   		eliminar_cuestionario($id);
	}
}
if (!function_exists('cuestionario_insertar')){
	foreach (glob("DAT/*.php") as $filename)
	{
		include $filename;
	}
	function cuestionario_insertar($cuestionario,$id_materia){
		$cuestionarioo=new cuestionario();
		$cuestionarioo->__construct2($cuestionario,$id_materia);
   		insertar_cuestionario($cuestionarioo->get_nombre(),$cuestionarioo->get_id_materia());
	}
}






 ?>