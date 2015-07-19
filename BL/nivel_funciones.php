<?php 
function nivel($id){
    require("DAT/conect.php");
    $SQL="call SP_nivel_cons('id','".$id."')";
    $resultado=mysqli_query($link,$SQL); 
    $nivel=mysqli_fetch_array($resultado);
    $nivel=$nivel["rol"];
	require("DAT/config_disconnect.php");
    return ($nivel);
}
 ?>