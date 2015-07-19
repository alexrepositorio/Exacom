<?php 
if (!class_exists('usuario')) {
    class usuario
    {
        var $id;
    	var $username;
    	var $password;
    	var $rol;
    	
    	function __construct()
    	{
    	}
       function __construct2($id,$username,$password,$rol)
        {
            $this->id=$id;
            $this->username=$username;
            $this->password=$password;
            $this->rol=$rol;
        } 
        public function set_id($id){
                    $this->id=$id;
        } 
        public function set_username($username){
                    $this->username=$username;
        } 
        public function set_password($password){
            $this->password=$password;
        }
         public function set_rol($rol){
            $this->rol=$rol;
        }
         public function get_id(){
            return $this->id;
        } 
        public function get_username(){
            return $this->username;
        } 
        public function get_password(){
            return $this->password;
        }
         public function get_rol(){
            return $this->rol;
        }
    }
}



 ?>