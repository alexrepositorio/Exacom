<?php 

if (!class_exists('area_conoc')) {
	class area_conoc
{
	var $id;
	var $nombre;
		function __construct()
		{
		}

		function __construct2($nombre)
        {
            $this->nombre=$nombre;
        } 
        function __construct3($id,$nombre)
        {
        	$this->id=$id;
            $this->nombre=$nombre;
        } 
        public function set_id($id){
                    $this->id=$id;
        } 
        public function set_nombre($nombre){
                    $this->nombre=$nombre;
        } 
        public function get_nombre(){
           return($this->nombre);
        } 
        public function get_id(){
           return($this->id);
        } 
	}
}














 ?>