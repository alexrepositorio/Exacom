<?php 
include("CLASES/usuario.php");
if (!function_exists('validar')){
		function validar($username,$pass)
			{		
				foreach (glob("DAT/*.php") as $filename)
				{
					include $filename;
				}
				
				$res_sql=validar_user($username,$pass);
				$cpin=mysqli_num_rows($res_sql);
    			$row_user=mysqli_fetch_array($res_sql);
				if ($cpin>0)
			    {
			    	$usuario=new usuario();
			    	$usuario->__construct2($row_user['id_usuario'],
			    		$username,$pass,$row_user['rol']);
			        session_start();
			        $_SESSION["cuenta"]=$usuario->get_id();
			        $_SESSION["user"]=$usuario->get_username();
			        $_SESSION["acceso"]=$usuario->get_rol();
			        //echo "hola".$_SESSION["acceso"];
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
}
 ?>
