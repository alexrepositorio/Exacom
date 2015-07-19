<?php 
if (!class_exists('materia')) {
	class materia
{
	var $id;
	var $nombre;
	var $id_area;
		function __construct()
		{
		}

		function __construct2($nombre,$id_area)
        {
            $this->nombre=$nombre;
            $this->id_area=$id_area;
        } 
        function __construct3($id,$nombre,$id_area)
        {
        	$this->id=$id;
            $this->nombre=$nombre;
            $this->id_area=$id_area;
        } 
        public function set_id($id){
                    $this->id=$id;
        } 
        public function set_nombre($nombre){
                    $this->nombre=$nombre;
        } 
         public function set_id_area($id_area){
                    $this->id_area=$id_area;
        } 
        public function get_nombre(){
           return($this->nombre);
        } 
        public function get_id(){
           return($this->id);
        } 
        public function get_id_area(){
           return($this->id_area);
        } 
	}
}















 ?>