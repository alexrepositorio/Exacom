<?php
include ("cabecera.php");
include ("BL/area_del_conocimiento_funciones.php");
include ("BL/materias_funciones.php");

if (isset($_POST["materia"])){
		insertar_materia($_POST["materia"],$_GET["malla"]);
		echo "<div align=center><h1>GUARDANDO, ESPERA...
		<meta http-equiv='Refresh' content='2;url=ficha_malla.php?malla=".$_GET["malla"]."'></font></h1></div>";
}else{
	if (isset($_GET["borrar"])) {
		 eliminar_materia($_GET["borrar"]);
		 echo "<div align=center><h1>Eliminando, ESPERA...
		<meta http-equiv='Refresh' content='2;url=ficha_malla.php?malla=".$_GET["malla"]."'></font></h1></div>";
	}
	$malla=area_consultar('id',$_GET["malla"]);
	$malla=$malla[0];
	echo "<div align=center>";
	echo "<br>";
	echo "<br>";
	echo " <h2>Malla curricular:<span class='blue'>".$malla["Titulacion"]."</span></h2>";
	echo "<form name=form action=".$_SERVER['PHP_SELF']."?malla=".$_GET["malla"]." method='post'>";
	echo "<table class=tablas>
	<tr><th colspan=2><h4>Nueva Materia</th></tr>";
	echo "<tr><th>Materia</th><td><input type='text' name=materia></td></tr>";
	echo "</table><br><input type='submit' value='Guardar'>";
	echo "</form>";
	echo "<br> <br> ";
	echo "<table  class='tablas' cellspacing=1 cellspadding=1 align=center border=2>";
	echo "<tr>   
			<th>Malla Curricular</th>
			<th>opciones</th>
	</tr>";
	$resultado=materias_consultar('titulacion',$_GET["malla"]);
	foreach ($resultado as $row) {
		echo "<tr> ";
		echo "<td>".$row['Materia']."</td>";
		echo "<td>  <a href=ficha_materia.php?materia=".$row["id_materias"].">
		<img width=20   src=images/pencil.png></a>
		<a href=ficha_malla.php?borrar=".$row["id_materias"]."&malla=".$_GET["malla"].">
		<img width=20   src=images/cross.png></a>
		</td>";
		echo "</tr>";	
	}
	echo "</table></div>";
}
include("pie.php");
?>