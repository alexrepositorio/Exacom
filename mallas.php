<?php
include ("cabecera.php");
include ("BL/area_del_conocimiento_funciones.php");
if (isset($_POST["malla"])){
		area_insertar(ucfirst($_POST["malla"]));
		echo "<div align=center><h1>GUARDANDO, ESPERA...
		<meta http-equiv='Refresh' content='2;url=mallas.php'></font></h1></div>";
}else{
	echo "<div align=center>";
	echo "<form name=form action=".$_SERVER['PHP_SELF']." method='post'>";
	echo "<table class=tablas>
	<tr><th colspan=2><h4>Nueva Area del conocimiento</th></tr>";
	echo "<tr><th>Area del conocimiento</th><td><input type='text' name=malla></td></tr>";
	echo "</table><br><input type='submit' value='Guardar'>";
	echo "</form>";
	echo "<br> <br> ";
	echo "<table  class='tablas' cellspacing=1 cellspadding=1 align=center border=2>";
	echo "<tr>   
			<th>Area del conocimiento</th>
			<th>opciones</th>
	</tr>";
	$resultado=area_consultar('','');
	foreach ($resultado as $row) {
		
		echo "<tr> ";
		echo "<td>".$row['Titulacion']."</td>";
		echo "<td>  <a href=ficha_malla.php?malla=".$row["id_Titulacion"]."><img width=20   src=images/pencil.png></a></td>";
		echo "</tr>";	
	}
	echo "</table></div>";
}
include("pie.php");
?>