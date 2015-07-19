<?php 
if (!class_exists('respuesta')) {
	class respuesta
{
	var $id;
	var $respuesta;
    var $estado;
	var $id_respuesta;

		function __construct()
		{
		}
		function __construct2($respuesta,$id_respuesta,$estado)
		{
            $this->respuesta=$respuesta;
            $this->id_respuesta=$id_respuesta;
            $this->estado=$estado;
		}
		function __construct3($id,$respuesta,$id_respuesta,$estado)
		{
			$this->id=$id;
            $this->respuesta=$respuesta;
            $this->id_respuesta=$id_respuesta;
            $this->estado=$estado;
		}
		public function set_id_respuesta($id_respuesta){
                 $this->id_respuesta=$id_respuesta;
        }    
        public function set_nombre($nombre){
                 $this->nombre=$nombre;
        }    
        public function set_respuesta($respuesta){
                    $this->respuesta=$respuesta;
        } 
        public function set_estado($estado){
                    $this->estado=$estado;
        } 
        public function get_nombre(){
           return($this->nombre);
        } 
         public function get_respuesta(){
           return($this->respuesta);
        } 
        public function get_id_respuesta(){
           return($this->id_respuesta);
        } 
	}
}
