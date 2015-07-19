<?php 
include ("cabecera.php");
include("BL/cuestionarios_funciones.php");

if(isset ($_GET["cuestionario"]) AND isset($_GET["aprobar"]))
{
	cuestionario_autorizar($_GET["cuestionario"]);
	echo "<div align=center><h1>Aprobando, ESPERA...
	<meta http-equiv='Refresh' content='2;url=ficha_cuestionario.php?cuestionario=".$_GET["cuestionario"]."'></font></h1></div>";
}else{

	echo "<notif>¿ESTA SEGURO?</notif><br><br>";
	echo "<table class=tablas><tr>";
	echo "<td width=50%><a href=ficha_aprobado.php?cuestionario=".$_GET["cuestionario"]."&aprobar=1&cuestionario><notifsi>SI</notifsi></a></td>";
	echo "<td width=50%><a href=ficha_cuestionario.php?cuestionario=".$_GET["cuestionario"]."><notifno>NO</notifno></a></td>";
	echo "</tr></table>";
}
include("pie.php");
 ?>