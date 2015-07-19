<?php 
if (!class_exists('pregunta')) {
	class pregunta
{
	var $id;
	var $pregunta;
	var $id_cuestionario;

		function __construct()
		{
		}
		function __construct2($pregunta,$id_cuestionario)
		{
            $this->pregunta=$pregunta;
            $this->id_cuestionario=$id_cuestionario;
		}
		function __construct3($id,$pregunta,$id_cuestionario)
		{
			 $this->id=$id;
            $this->pregunta=$pregunta;
             $this->id_cuestionario=$id_cuestionario;
		}
		public function set_id_cuestionario($id_cuestionario){
                 $this->id_cuestionario=$id_cuestionario;
        }    
        public function set_nombre($nombre){
                 $this->nombre=$nombre;
        }    
        public function set_preguntas($preguntas){
                    $this->preguntas=$preguntas;
        } 
        public function get_nombre(){
           return($this->nombre);
        } 
         public function get_preguntas(){
           return($this->preguntas);
        } 
        public function get_id_cuestionario(){
           return($this->id_cuestionario);
        } 
	}
}
 ?>