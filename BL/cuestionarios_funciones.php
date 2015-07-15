<?php 
function cuestionario_consultar($criterio,$valor){
    require("DAT/conect.php");
    $SQL="call SP_cuestionarios_cons('".$criterio."','".$valor."')";
    $resultado=mysqli_query($link,$SQL) or die(mysqli_error($link));
	require("DAT/config_disconnect.php");
    return (transformar_a_lista($resultado));
}





 ?>