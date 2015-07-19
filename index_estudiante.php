<?php 
include('cabecera.php');
include('BL/cuestionarios_funciones.php');

if(!isset($_GET["criterio"]))
{
  $cuestionarios=cuestionario_consultar("estudiante",$_SESSION["cuenta"]);
  $texto="";
}else{
    $cuestionarios=cuestionario_consultar($_GET["criterio"],$_SESSION["cuenta"]);
    $texto="Criterio de busqueda: ".$_GET["criterio"]."";
}
echo"<div id='maincontent' class='bodywidth clear' align='center'>
    <h2>Listado de Cuestionarios</h2>";
 "<H4>$texto</h4></br>";
echo "<H4 > Total Cuestionarios: (".count($cuestionarios).")</h4> </br>";
echo "<table>
  <thead>
    <tr>
    <th><h3>Materias</h3></th>
    <th><h3>Cuestionario</h3></th>
    <th><h3>Opciones</h3></th>
    </tr>
  </thead>
  <tbody>";
  if (is_array($cuestionarios)) {
  foreach ($cuestionarios as $cuestionario) {
    echo "<tr>";
    echo "<td><h4>".$cuestionario['Materia']."</h4></td>";
      echo "<td><h4>".$cuestionario['cuestionario']." </h4></td>";
      echo "<td><a href=ficha_cuestionario_ver.php?cuestionario=".$cuestionario['id_cuestionario'].">
          <img src=images/ver.png width=20></a>
          </td>";
    } 
}else{
  echo "<tr>";
  echo "<td>sin datos</td>";
  echo "</tr>";
}
echo "</tbody>";
echo "</table>";
include('pie.php');
?>