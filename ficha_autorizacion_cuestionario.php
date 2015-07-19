<?php 
include("cabecera.php");
include("BL/cuestionarios_funciones.php");
include("BL/preguntas_funciones.php");
include("BL/respuestas_funciones.php");

 $cuestionario=cuestionario_consultar("id",$_GET["cuestionario"]);
 $cuestionario=$cuestionario[0];
 $preguntas=preguntas_consultar('cuestionario',$_GET["cuestionario"]);
 $total=count($preguntas);

if(isset ($_GET["cuestionario"]) AND isset($_GET["aprobar"]))
{
  cuestionario_autorizar($_GET["cuestionario"]);
  echo "<div align=center><h1>Aprobando, ESPERA...
  <meta http-equiv='Refresh' content='2;url=index_admin.php></font></h1></div>";
}


echo"
<div id='maincontent' class='bodywidth clear' align='center'>
    <h2>Ficha del cuestionario ".$cuestionario['cuestionario']." </h2><br>
    <h3>Total de preguntas del cuestionario: ". $total." </h3>
    <a href=?cuestionario=".$_GET["cuestionario"]."&aprobar=1 onclick='cuestionario_autorizar();'><br>
          <img src=images/visto.png width=50></a><h3>Aprobar Cuestionario</h3>";

echo "<table>
  <thead>
    <tr>
    <th><h3>Preguntas</h3></th>
    <th width='10%'><h3>Opciones</h3></th>
    </tr>
  </thead>
  <tbody>";
 
  if (is_array($preguntas)) {
  foreach ($preguntas as $pregunta) {
    echo "<tr>";
    echo "<td><h3>".$pregunta['pregunta']."</h3><br>";
    $respuestas=respuestas_consultar('pregunta',$pregunta['id_pregunta']);
    if (is_array($respuestas)) {
      echo "<ul>";
      foreach ($respuestas as $respuesta) {
        if ($respuesta['correcta']==1) {
          echo "<li><mark>".$respuesta['respuesta']."</mark></li><br>";
        }else{
         echo "<li>".$respuesta['respuesta']."</li><br>";
        }
      }
      echo "</ul>";
    }else{
      echo "Sin respuestas";
    }
    echo"</td>";
      echo "<td><h4><a href=ficha_pregunta_editar.php?pregunta=".$pregunta['id_pregunta']."&cuestionario=".$_GET["cuestionario"].">
          <img src=images/pencil.png width=20></a>
          <a href=ficha_pregunta_borrar.php?pregunta=".$pregunta['id_pregunta']."&cuestionario=".$_GET["cuestionario"]."> 
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