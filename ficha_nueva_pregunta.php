<?php 
include("cabecera.php");
include("BL/cuestionarios_funciones.php");
include("BL/preguntas_funciones.php");
include("BL/respuestas_funciones.php");

if (isset($_POST['pregunta'])) {
  preguntas_insertar($_POST['pregunta'],$_GET["cuestionario"]);
  $pregunta=preguntas_consultar('enunciado',$_POST['pregunta']);
  $pregunta=$pregunta[0]['id_pregunta'];
  if (isset($_POST['Correcta'])) {
    switch ($_POST['Correcta']) {
      case '1':
        respuesta_insertar($_POST['Alt1'],1,$pregunta);
        respuesta_insertar($_POST['Alt2'],0,$pregunta);
        respuesta_insertar($_POST['Alt3'],0,$pregunta);
        break;
      case '2':
        respuesta_insertar($_POST['Alt1'],0,$pregunta);
        respuesta_insertar($_POST['Alt2'],1,$pregunta);
        respuesta_insertar($_POST['Alt3'],0,$pregunta);
        break;
      case '3':
        respuesta_insertar($_POST['Alt1'],0,$pregunta);
        respuesta_insertar($_POST['Alt2'],0,$pregunta);
        respuesta_insertar($_POST['Alt3'],1,$pregunta);
        break;
      default:
        break;
    }
    echo "<div align=center><h1>GUARDANDO, ESPERA...
    <meta http-equiv='Refresh' content='2;url=ficha_cuestionario.php?cuestionario=".$_GET["cuestionario"]."'></font></h1></div>";
  }
}else{
  echo "<div align=center><h1>NUEVA PREGUNTA</h1><br>";

  echo "<form name=form action=".$_SERVER['PHP_SELF']."?cuestionario=".$_GET["cuestionario"]." method='post'>";
    echo "<table>";
    echo "<tr><th><h4>Pregunta</th><td><input type='text' name=pregunta required  size='80'></td></tr>";
    echo "<tr><th><h4>Alternativa 1</th><td><input type='text' name=Alt1 required  size='80'>&emsp;<input type='radio' name='Correcta' value='1' checked>  </td></tr>";
    echo "<tr><th><h4>Alternativa 2</th><td><input type='text' name=Alt2 required  size='80'> &emsp;<input type='radio' name='Correcta' value='2'>  </td></tr>";
    echo "<tr><th><h4>Alternativa 3</th><td><input type='text' name=Alt3 required  size='80'>&emsp;<input type='radio' name='Correcta' value='3'>  </td></tr>";
    echo "</table>";
    echo "<input type='submit' value='Guardar'>";
  echo "</form>";
}



include("pie.php");
 ?>