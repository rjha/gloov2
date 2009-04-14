<?php

/*
 *
 * configuration items for gloo v2
 * PHP  singleton implementation need not be thread safe!
 * I do not think there is even the concept of thread safe in PHP!
 * 
 *
 *
 */

class Gloo_Config  {


	static private $instance = NULL ;
	private $ini_array ;

	static function getInstance() {
		if(self::$instance == NULL ) {
			self::$instance = new Gloo_Config();
		}
		
		return self::$instance ;

	}


	function __construct(){
		// create config object 
		$this->ini_array = parse_ini_file($_SERVER['GLOO_INC_DIR'].'gloo_config.ini');

	}

	function __destruct(){}
	
	function mysql_host() {
		return $this->ini_array['mysql.host'];
	}

	function mysql_db() {
		return $this->ini_array['mysql.database'];
	}

	function mysql_user() {
		return $this->ini_array['mysql.user'];
	}

	function mysql_password() {
		//fetch encrypted password
		$encpassword = $this->ini_array['mysql.password'];
		$password = Gloo_Util::b64_decrypt($encpassword);
		return $password;
		
	}


	function gmap_key() {
		return $this->ini_array['gmap.key'];
	}
	function is_debug() {
		$val = $this->ini_array['debug.mode'];
        if(intval($val) == 1 ) {
            return true ;
        } else  {
            return false ;
        }
        
	}
    
	function log_level() {
		return $this->ini_array['log.level'];
        
	}
	
	function get_pagination_size() {
		return $this->ini_array['pagination.size'];
	}

	function get_max_file_size() {
		return $this->ini_array['file.max.size'];
	}

	function get_max_foto_size() {
		return $this->ini_array['foto.max.size'];
	}
	
	function get_thumbnail_width() {
		return $this->ini_array['thumbnail.width'];
	}

	function get_thumbnail_height() {
		return $this->ini_array['thumbnail.height'];
	}

	
	
	
	
}

?>
