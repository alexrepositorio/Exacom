<?php 
include('cabecera.php');
include('BL/cuestionarios_funciones.php');

if(!isset($_GET["criterio"]))
{
  $cuestionarios=cuestionario_consultar("user",$_SESSION["cuenta"]);
  $texto="";
}else{
    $cuestionarios=cuestionario_consultar($_GET["criterio"],$_SESSION["cuenta"]);
    $texto="Criterio de busqueda: ".$_GET["criterio"]."";
}
echo"<div id='maincontent' class='bodywidth clear' align='center'>
    <h2>Listado de Materias</h2>";
 "<H4>$texto</h4></br>";
 echo "<td><h4>Pendientes<br>";
  echo "<a href=?criterio=pendientes><img width=35 src=images/pendientes.png></a>";
  echo "</td>";
echo "<H4 > Total Cuestionarios: (".count($cuestionarios).")</h4> </br>";
echo "<table>
  <thead>
    <tr>
    <th><h3>Materias</h3></th>
    <th><h3>Cuestionario</h3></th>
    <th><h3>Estado</h3></th>
    <th><h3>Opciones</h3></th>
    </tr>
  </thead>
  <tbody>";
  if (is_array($cuestionarios)) {
  foreach ($cuestionarios as $cuestionario) {
    echo "<tr>";
    echo "<td><h4>".$cuestionario['Materia']."</h4></td>";
      echo "<td><h4>".$cuestionario['cuestionario']." </h4></td>";
      if ($cuestionario['estado']==1) {
        $opciones="<td>
          <img src=images/visto.png width=20>
          </td>";
      }else{
          echo "<td><h4><font color=red>PENDIENTE  </h4></td>";
          $opciones="<td><a href=ficha_autorizacion_cuestionario.php?cuestionario=".$cuestionario['id_cuestionario'].">
          <img src=images/ver.png width=20></a>
          </td>";
        } 
        echo "$opciones";
    } 
}else{
  echo "<tr>";
  echo "<td>sin datos</td>";
  echo "</tr>";
}
echo "</tbody>";
echo "</table>";




include('pie.php') ?>