<?php
include("CLASES/respuesta.php");
if (!function_exists('respuestas_consultar')) {
     function respuestas_consultar($criterio,$valor){
    require("DAT/DATrespuestas.php");
    $resultado=consultar_respuestas($criterio,$valor);
    return (transformar_a_lista($resultado));
    }
 } 
if (!function_exists('respuesta_insertar')) {
   function respuesta_insertar($respuesta,$correcta,$pregunta){
     require("DAT/DATrespuestas.php");
     $respuestaa=new respuesta();
     $respuestaa->__construct2($respuesta,$pregunta,$correcta);
    insertar_respuesta($respuestaa->get_respuesta(),$respuestaa->get_estado(),
        $respuestaa->get_id_pregunta());
    }
}
if (!function_exists('respuesta_upd')) {
    function respuesta_upd($id,$respuesta,$correcta,$pregunta){
   require("DAT/DATrespuestas.php");
    $respuestaa=new respuesta();
    $respuestaa->__construct3($id,$respuesta,$pregunta,$correcta);
   actualizar_respuesta($respuestaa->get_id(),$respuestaa->get_respuesta(),$respuestaa->get_estado(),
        $respuestaa->get_id_pregunta());
    }
}
 ?>