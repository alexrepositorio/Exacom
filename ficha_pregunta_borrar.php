<?php 

include ("cabecera.php");
include("BL/preguntas_funciones.php");

if(isset ($_GET["pregunta"]) AND isset($_GET["borra"]))
{
	preguntas_del($_GET["pregunta"]);
	echo "<div align=center><h1>BORRANDO, ESPERA...
	<meta http-equiv='Refresh' content='2;url=ficha_cuestionario.php?cuestionario=".$_GET["cuestionario"]."'></font></h1></div>";
}else{
	$pregunta=preguntas_consultar('id',$_GET["pregunta"]);
	$pregunta=$pregunta[0];
	echo "<div align=center><h1>Borrar la pregunta</h1><br><h2>".$pregunta["pregunta"]." </h2><br><br>";
	echo "<notif>¿ESTA SEGURO?</notif><br><br>";
	echo "<table class=tablas><tr>";
	echo "<td width=50%><a href=ficha_pregunta_borrar.php?pregunta=".$_GET["pregunta"]."&borra=1&cuestionario=".$_GET["cuestionario"]."><notifsi>SI</notifsi></a></td>";
	echo "<td width=50%><a href=ficha_cuestionario.php?cuestionario=".$_GET["cuestionario"]."><notifno>NO</notifno></a></td>";
	echo "</tr></table>";
}
include("pie.php");
 ?>