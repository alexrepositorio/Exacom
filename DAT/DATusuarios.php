<?php 
if (!function_exists('validar_user')){

function validar_user($user,$pass){
    require("DAT/conect.php");
    $SQL="call SP_usuarios_find('".$user."','".$pass."')";
    $res_sql=mysqli_query($link,$SQL);
    return($res_sql);
    require("DAT/config_disconnect.php"); 
}



}










 ?>