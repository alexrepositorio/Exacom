<?php 
if (!class_exists('cuestionario')) {
	class cuestionario
{
	var $id;
	var $nombre;
	var $id_materia;
		function __construct()
		{
		}

		function __construct2($nombre,$id_materia)
        {
            $this->nombre=$nombre;
            $this->id_materia=$id_materia;
        } 
        function __construct3($id,$nombre,$id_materia)
        {
        	$this->id=$id;
            $this->nombre=$nombre;
            $this->id_materia=$id_materia;
        } 
        public function set_id($id){
                    $this->id=$id;
        } 
        public function set_nombre($nombre){
                    $this->nombre=$nombre;
        } 
        public function set_id_materia($id_materia){
                    $this->id_materia=$id_materia;
        } 
        public function get_nombre(){
           return($this->nombre);
        } 
         public function get_id_materia(){
           return($this->id_materia);
        } 
        public function get_id(){
           return($this->id);
        } 
	}
}
 ?>	