<?php 
include("CLASES/pregunta.php");
if (!function_exists('consultar_preguntas')) {
    function consultar_preguntas($criterio,$valor){
   require("DAT/DATpreguntas.php");
    $resultado=preguntas_consultar($criterio,$valor);
    return (transformar_a_lista($resultado));
    }
}
if (!function_exists('insertar_preguntas')) {
    function insertar_preguntas($pregunta,$cuestionario){
    require("DAT/DATpreguntas.php");
    $preguntaa=new pregunta();
    $preguntaa->__construct2($pregunta,$cuestionario);
    $resultado=preguntas_insertar($preguntaa->get_preguntas(),$preguntaa->get_id_cuestionario());
    }
}
if (!function_exists('actualizar_preguntas')) {
    function actualizar_preguntas($id,$pregunta,$cuestionario){
    require("DAT/DATpreguntas.php");
     $preguntaa=new pregunta();
    $preguntaa->__construct3($id,$pregunta,$cuestionario);
    $resultado=preguntas_upd($preguntaa->get_id(),$preguntaa->get_preguntas(),$preguntaa->get_id_cuestionario());
    }
}
if (function_exists('borrar_preguntas')) {
    function borrar_preguntas($id){
    require("DAT/DATpreguntas.php");
    $resultado=preguntas_del($id);
    }
}
 ?>