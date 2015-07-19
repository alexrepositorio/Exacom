<?php 
    if (!class_exists('respuesta')) {
    	class respuesta
    {
    	var $id;
    	var $respuesta;
        var $estado;
    	var $id_pregunta;

    		function __construct()
    		{
    		}
    		function __construct2($respuesta,$id_pregunta,$estado)
    		{
                $this->respuesta=$respuesta;
                $this->id_pregunta=$id_pregunta;
                $this->estado=$estado;
    		}
    		function __construct3($id,$respuesta,$id_pregunta,$estado)
    		{
    			$this->id=$id;
                $this->respuesta=$respuesta;
                $this->id_pregunta=$id_pregunta;
                $this->estado=$estado;
    		}
            public function set_id($id){
                     $this->id=$id;
            }  
    		public function set_id_pregunta($id_pregunta){
                     $this->id_pregunta=$id_pregunta;
            }    
            public function set_respuesta($respuesta){
                     $this->respuesta=$respuesta;
            }    
            public function set_estado($estado){
                        $this->estado=$estado;
            } 
            public function get_respuesta(){
               return($this->respuesta);
            } 
            public function get_id_pregunta(){
               return($this->id_pregunta);
            } 
            public function get_estado(){
                return( $this->estado);
            } 
            public function get_id(){
                     return($this->id);
            }  
    	}
    }
?>