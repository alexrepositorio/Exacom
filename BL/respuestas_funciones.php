<?php 
function respuestas_consultar($criterio,$valor){
    require("DAT/conect.php");
    $SQL="call SP_respuestas_cons('".$criterio."','".$valor."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
    return (transformar_a_lista($resultado));
}

function respuesta_insertar($respuesta,$correcta,$pregunta){
    require("DAT/conect.php");
    $SQL="call SP_respuestas_ins('".$respuesta."','".$correcta."','".$pregunta."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
}
function respuesta_upd($id,$respuesta,$correcta,$pregunta){
    require("DAT/conect.php");
    $SQL="call SP_respuestas_upd('".$id."','".$respuesta."','".$correcta."','".$pregunta."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
}






 ?>