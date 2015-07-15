<?php 
function validar($user,$pass){
    require("DAT/conect.php");
    $SQL="call SP_usuarios_find('".$user."','".$pass."')";
    $res_sql=mysqli_query($link,$SQL);
    $cpin=mysqli_num_rows($res_sql);
    $row_user=mysqli_fetch_array($res_sql);
    require("DAT/config_disconnect.php");
    if ($cpin>0)
    {
        session_start();
        $_SESSION["cuenta"]=$row_user['id_usuario'];
        $_SESSION["user"]=$user;
        $_SESSION["acceso"]=$row_user['rol'];
        switch ($_SESSION["acceso"]) {
            case '1':
                header("Location:index_admin.php");

                break;
             case '2':
                header("Location:index_estudiante.php");
                break;
            case '3':
                header("Location:index_docente.php");
                break;
            default:
                break;
        }
    }
    else
    {
        echo"<div align=center><notif>Usuario o clave incorrecta</notif></div>";
    }
}

 ?>