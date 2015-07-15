<?php 
function preguntas_consultar($criterio,$valor){
    require("DAT/conect.php");
    $SQL="call SP_preguntas_cons('".$criterio."','".$valor."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
    return (transformar_a_lista($resultado));
}
function preguntas_insertar($pregunta,$cuestionario){
    require("DAT/conect.php");
    $SQL="call SP_preguntas_ins('".$pregunta."','".$cuestionario."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
}
function preguntas_upd($id,$pregunta,$cuestionario){
    require("DAT/conect.php");
    $SQL="call SP_preguntas_upd('".$id."','".$pregunta."','".$cuestionario."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
}
function preguntas_del($id){
    require("DAT/conect.php");
    $SQL="call SP_preguntas_del('".$id."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
    require("DAT/config_disconnect.php");
}



 ?>