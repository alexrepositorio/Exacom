<?php 

include("cabecera.php");
include("BL/cuestionarios_funciones.php");
include("BL/preguntas_funciones.php");
include("BL/respuestas_funciones.php");
 $cuestionario=cuestionario_consultar("id",$_GET["cuestionario"]);
 $cuestionario=$cuestionario[0];
 $preguntas=consultar_preguntas('cuestionario',$_GET["cuestionario"]);
 $total=count($preguntas);
?> 
<div align="center">
	<a href="javascript:imprimir('maincontent')" ><img src="images/impresora.png" width="65px"></a>	
</div>
<?php  
echo "
<div id='maincontent' class='bodywidth clear' align='center'>
    <h2>Ficha del cuestionario ".$cuestionario['cuestionario']." </h2><br>
    <h3>Total de preguntas del cuestionario: ". $total." </h3>";
echo "<table>
  <thead>
    <tr>
    <th><h3>Preguntas</h3></th>
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
   }
	}else{
  		echo "<tr>";
  		echo "<td>sin datos</td>";
  		echo "</tr>";
	}
echo "</tbody>";
echo "</table>";
echo "</div>";
 ?>
 