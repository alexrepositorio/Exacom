<?php 
include("cabecera.php");
include("BL/cuestionarios_funciones.php");
include("BL/preguntas_funciones.php");
include("BL/respuestas_funciones.php");

 $pregunta=preguntas_consultar('id',$_GET['pregunta']);
 $pregunta=$pregunta[0];
if (isset($_POST['pregunta'])) {
  preguntas_upd($_GET['pregunta'],$_POST['pregunta'],$_GET["cuestionario"]);
  if (isset($_POST['Correcta'])) {
    switch ($_POST['Correcta']) {
      case '1':
        respuesta_upd($_POST['id1'],$_POST['Alt1'],1,$_GET['pregunta']);
        respuesta_upd($_POST['id2'],$_POST['Alt2'],0,$_GET['pregunta']);
        respuesta_upd($_POST['id3'],$_POST['Alt3'],0,$_GET['pregunta']);
        break;
      case '2':
        respuesta_upd($_POST['id1'],$_POST['Alt1'],0,$_GET['pregunta']);
        respuesta_upd($_POST['id2'],$_POST['Alt2'],1,$_GET['pregunta']);
        respuesta_upd($_POST['id3'],$_POST['Alt3'],0,$_GET['pregunta']);
        break;
      case '3':
        respuesta_upd($_POST['id1'],$_POST['Alt1'],0,$_GET['pregunta']);
        respuesta_upd($_POST['id2'],$_POST['Alt2'],0,$_GET['pregunta']);
        respuesta_upd($_POST['id3'],$_POST['Alt3'],1,$_GET['pregunta']);
        break;
      default:
        break;
    }
    echo "<div align=center><h1>GUARDANDO, ESPERA...
    <meta http-equiv='Refresh' content='2;url=ficha_cuestionario.php?cuestionario=".$_GET["cuestionario"]."'></font></h1></div>";
  }
}else{
  echo "<div align=center><h1>EDITAR PREGUNTA</h1><br>";

  echo "<form name=form action=".$_SERVER['PHP_SELF']."?cuestionario=".$_GET["cuestionario"]."&pregunta=".$_GET['pregunta']." method='post'>";
    echo "<table>";
    echo "<tr><th><h4>Pregunta</th><td><input type='text' name=pregunta  value=".$pregunta['pregunta']." required  size='80'></td></tr>";

    $respuestas=respuestas_consultar('pregunta',$_GET['pregunta']);
    echo "<tr><th><h4>Alternativa 1</th><td><input type='text' name=Alt1 value='".$respuestas[0]['respuesta']."'' required  size='80'>&emsp;";
    echo "<input type='hidden' name='id1' value='".$respuestas[0]['id_respuesta']."'>";
    if ($respuestas[0]['correcta']==1) {
     echo "<input type='radio' name='Correcta' value='1' checked>";
    }else{
      echo "<input type='radio' name='Correcta' value='1'>";
    }

     echo "</td></tr>";
    echo "<tr><th><h4>Alternativa 2</th><td><input type='text' name=Alt2 value='".$respuestas[1]['respuesta']."' required  size='80'> &emsp;";
    echo "<input type='hidden' name='id2' value='".$respuestas[1]['id_respuesta']."'>";
    if ($respuestas[1]['correcta']==1) {
     echo "<input type='radio' name='Correcta' value='2' checked>";
    }else{
      "<input type='radio' name='Correcta' value='2'>";
    }
    echo "</td></tr>";
    echo "<tr><th><h4>Alternativa 3</th><td><input type='text' name=Alt3 value='".$respuestas[2]['respuesta']."'required  size='80'>&emsp;";
    echo "<input type='hidden' name='id3' value='".$respuestas[2]['id_respuesta']."'>";
    if ($respuestas[2]['correcta']==1) {
     echo "<input type='radio' name='Correcta' value='3' checked>";
    }else{
      echo "<input type='radio' name='Correcta' value='3'>";
    }
    echo "</td></tr>";
    echo "</table>";
    echo "<input type='submit' value='Guardar'>";
  echo "</form>";
}
include("pie.php");
 ?>