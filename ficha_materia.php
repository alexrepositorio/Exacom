<?php 
include("cabecera.php");
include("BL/materias_funciones.php");
include("BL/cuestionarios_funciones.php");

 $materia=consultar_materia("id",$_GET["materia"]);
 $materia=$materia[0];
 $cuestionarios=cuestionario_consultar('materia',$materia['Materia']);
 $total=count($cuestionarios);
if (isset($_POST["borrar"])) {
	 cuestionario_eliminar($_GET["borrar"]);
	 echo "<div align=center><h1>Eliminando, ESPERA...
	<meta http-equiv='Refresh' content='2;url=ficha_materia.php?materia=".$_GET["materia"]."'></font></h1></div>";
}
if (isset($_POST["cuestionario"])) {
		 cuestionario_insertar($_POST["cuestionario"],$_GET["materia"]);
	 echo "<div align=center><h1>Guardando, ESPERA...
	<meta http-equiv='Refresh' content='2;url=ficha_materia.php?materia=".$_GET["materia"]."'></font></h1></div>";
}
echo"
<div id='maincontent' class='bodywidth clear' align='center'>
    <h2>Ficha del materia: ".$materia['Materia']." </h2><br>
    <h3>Total de cuestionarios: ". $total." </h3>";
echo "<form name=form action=".$_SERVER['PHP_SELF']."?materia=".$_GET["materia"]." method='post'>";
	echo "<table class=tablas>
	<tr><th colspan=2><h4>Nuevo Cuestionario</th></tr>";
	echo "<tr><th>Cuestionario</th><td><input type='text' name=cuestionario></td></tr>";
	echo "</table><br><input type='submit' value='Guardar'>";
	echo "</form>";
echo "<table>
  <thead>
    <tr>
    <th><h3>Cuestionarios</h3></th>
    <th width='10%'><h3>Opciones</h3></th>
    </tr>
  </thead>
  <tbody>";
 
  if (is_array($cuestionarios)) {
  foreach ($cuestionarios as $cuestionario) {
    echo "<tr>";
    echo "<td><h3>".$cuestionario['cuestionario']."</h3><br>";
    echo"</td>";
      echo "<td><h4><a href=ficha_cuestionario_editar.php?cuestionario=".$cuestionario['id_cuestionario']."&materia=".$_GET["materia"].">
          <img src=images/pencil.png width=20></a>
          <a href=ficha_cuestionario_borrar.php?borrar=".$cuestionario['id_cuestionario']."&materia=".$_GET["materia"]."> 
          <img src=images/cross.png width=20></a> </h4></td>";
      echo "</tr>";
      }
	}else{
  		echo "<tr>";
  		echo "<td>sin datos</td>";
  		echo "</tr>";
	}
echo "</tbody>";
echo "</table>";
?>
