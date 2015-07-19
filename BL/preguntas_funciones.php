<?php 
include("clases/pregunta.php");
function consultar_preguntas($criterio,$valor){
    foreach (glob("DAT/*.php") as $filename)
                {
                    include $filename;
                }
    $resultado=preguntas_consultar($criterio,$valor);
    return (transformar_a_lista($resultado));
}
function insertar_preguntas($pregunta,$cuestionario){
    foreach (glob("DAT/*.php") as $filename)
                {
                    include $filename;
                }
    $resultado=preguntas_insertar($pregunta,$cuestionario);
}
function actualizar_preguntas($id,$pregunta,$cuestionario){
    foreach (glob("DAT/*.php") as $filename)
                {
                    include $filename;
                }
    require("DAT/conect.php");
    $resultado=preguntas_upd($id,$pregunta,$cuestionario);
}
function borrar_preguntas($id){
    foreach (glob("DAT/*.php") as $filename)
                {
                    include $filename;
                }
    $resultado=preguntas_del($id);
}



 ?>