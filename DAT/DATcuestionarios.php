<?php 
if (!function_exists('consultar_cuestionario')){

	function consultar_cuestionario($criterio,$valor){
		    require("DAT/conect.php");
		    $SQL="call SP_cuestionarios_cons('".$criterio."','".$valor."')";
		    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
			require("DAT/config_disconnect.php");
		    return ($resultado);
		}
}
if (!function_exists('autorizar_cuestionario')){

function autorizar_cuestionario($id){
		    require("DAT/conect.php");
		   	$SQL="call SP_cuestionario_aprobar('".$id."')";
		    mysqli_query($link,$SQL) or die(mysqli_error($link));
			require("DAT/config_disconnect.php");
		}
}
if (!function_exists('eliminar_cuestionario')){

function eliminar_cuestionario($id){
		    require("DAT/conect.php");
		   	$SQL="call SP_cuestionarios_del('".$id."')";
		    mysqli_query($link,$SQL) or die(mysqli_error($link));
			require("DAT/config_disconnect.php");
		}
}
if (!function_exists('insertar_cuestionario')){

function insertar_cuestionario($cuestionario,$id_materia){
		    require("DAT/conect.php");
		   	$SQL="call SP_cuestionarios_ins('".$cuestionario."','".$id_materia."')";
		    mysqli_query($link,$SQL) or die(mysqli_error($link));
			require("DAT/config_disconnect.php");
		}
}
 ?>
